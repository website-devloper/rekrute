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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('job_type');
            $table->string('job_category');
            $table->string('experience');
            $table->decimal('minimum_salary',10,2);
            $table->decimal('maximum_salary',10,2);
            $table->string('city');
            $table->string('country');
            $table->text('description');
            $table->text('job_responsabilities');
            $table->text('requirements');
            $table->foreignId('employer_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
