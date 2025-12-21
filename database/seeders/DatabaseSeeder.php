<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\candidate;
use App\Models\employer;
use App\Models\Job;
use App\Models\application;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Categories first (Static Data)
        $categories = ['IT', 'Sales', 'Marketing', 'Finance', 'HR', 'Engineering', 'Education', 'Medical'];
        foreach ($categories as $cat) {
            DB::table('job_categories')->insertOrIgnore([
                'name' => $cat,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // 2. Create Candidates
        // Create one known candidate for testing
        candidate::factory()->create([
            'email' => 'candidate@rekrute.com',
            'password' => bcrypt('password'), // password
            'first_name' => 'John',
            'last_name' => 'Can',
        ]);
        
        // Create 10 random candidates
        $candidates = candidate::factory(10)->create();

        // 3. Create Employers and Jobs
        // Create one known employer for testing
        $testEmployer = employer::factory()->create([
            'email_adress' => 'employer@rekrute.com',
            'password' => bcrypt('password'), // password
            'name' => 'Rekrute Corp',
        ]);

        Job::factory(5)->create([
            'employer_id' => $testEmployer->id
        ]);

        // Create 5 random employers with 3 jobs each
        $employers = employer::factory(5)
            ->has(Job::factory()->count(3))
            ->create();

        // 4. Create Applications
        // Randomly apply candidates to jobs
        $allJobs = Job::all();
        
        foreach ($candidates as $candidate) {
            // Each candidate applies to 1-3 random jobs
            $jobsToApply = $allJobs->random(rand(1, 3));
            foreach ($jobsToApply as $job) {
                application::factory()->create([
                    'candidate_id' => $candidate->id,
                    'job_id' => $job->id,
                ]);
            }
        }
    }
}
