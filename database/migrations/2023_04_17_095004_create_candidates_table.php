<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('job_title')->nullable();
            $table->string('price_wish')->nullable();
            $table->string('gender')->nullable();
            $table->string('city')->nullable();
            $table->string('street')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->integer('phone')->nullable();
            $table->string('about')->nullable();
            $table->string('img_url')->nullable();
            $table->string('resume')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
