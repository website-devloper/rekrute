<?php

namespace Database\Factories;

use App\Models\application;
use App\Models\Job;
use App\Models\candidate;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApplicationFactory extends Factory
{
    protected $model = application::class;

    public function definition(): array
    {
        return [
            'job_id' => Job::factory(),
            'candidate_id' => candidate::factory(),
            'resume' => 'resume_sample.pdf',
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected', 'reviewed']),
        ];
    }
}
