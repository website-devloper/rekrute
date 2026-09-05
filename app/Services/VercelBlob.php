<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RuntimeException;

/**
 * Minimal client for Vercel Blob storage.
 *
 * Vercel's filesystem is read-only, so uploaded resumes, avatars and company
 * logos cannot live on disk. This talks to the Blob HTTP API directly (there is
 * no official PHP SDK) and returns a permanent public URL that we store in the
 * database instead of a relative path.
 *
 * When BLOB_READ_WRITE_TOKEN is not set — local development — it falls back to
 * the public disk so nothing changes for `php artisan serve`.
 */
class VercelBlob
{
    private const API_URL = 'https://vercel.com/api/blob';

    private const API_VERSION = '12';

    public static function enabled(): bool
    {
        return (bool) config('services.vercel_blob.token');
    }

    /**
     * Upload a file and return its public URL.
     *
     * @param  string  $prefix  Folder inside the blob store, e.g. "resumes".
     */
    public static function put(UploadedFile $file, string $prefix): string
    {
        $pathname = trim($prefix, '/').'/'.Str::random(24).'.'.$file->getClientOriginalExtension();

        if (! self::enabled()) {
            return Storage::disk('public')->url(
                $file->storeAs($prefix, basename($pathname), 'public')
            );
        }

        $token = config('services.vercel_blob.token');

        $response = Http::withHeaders([
            'authorization' => 'Bearer '.$token,
            'x-api-version' => self::API_VERSION,
            'x-vercel-blob-store-id' => self::storeId($token),
            'x-vercel-blob-access' => 'public',
            'x-content-type' => $file->getMimeType() ?: 'application/octet-stream',
            'x-add-random-suffix' => '0',
        ])
            ->withBody(file_get_contents($file->getRealPath()), $file->getMimeType() ?: 'application/octet-stream')
            ->timeout(30)
            ->put(self::API_URL.'/?'.http_build_query(['pathname' => $pathname]));

        if ($response->failed() || ! $response->json('url')) {
            Log::error('Vercel Blob upload failed', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            throw new RuntimeException('Could not upload the file. Please try again.');
        }

        return $response->json('url');
    }

    /**
     * Delete a previously uploaded blob. Silently ignores legacy on-disk paths
     * and anything that is not a blob URL.
     */
    public static function delete(?string $url): void
    {
        if (! $url || ! Str::startsWith($url, 'http')) {
            return;
        }

        if (! self::enabled() || ! Str::contains($url, 'blob.vercel-storage.com')) {
            return;
        }

        $token = config('services.vercel_blob.token');

        Http::withHeaders([
            'authorization' => 'Bearer '.$token,
            'x-api-version' => self::API_VERSION,
            'x-vercel-blob-store-id' => self::storeId($token),
        ])->timeout(15)->post(self::API_URL.'/delete', ['urls' => [$url]]);
    }

    /**
     * Read-write tokens look like vercel_blob_rw_<storeId>_<secret>.
     */
    private static function storeId(string $token): string
    {
        return explode('_', $token)[3] ?? '';
    }
}
