<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\employer;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'employer_id' => employer::factory(), // Automatically create employer if not provided
            'job_type' => $this->faker->randomElement(['Full Time', 'Part Time', 'Contract', 'Remote']),
            'job_category' => $this->faker->randomElement(['IT', 'Sales', 'Marketing', 'Finance', 'HR', 'Engineering']),
            'experience' => $this->faker->randomElement(['Entry Level', 'Mid Level', 'Senior', 'Executive']),
            'minimum_salary' => $this->faker->numberBetween(4000, 8000),
            'maximum_salary' => $this->faker->numberBetween(9000, 20000),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'description' => $this->faker->paragraphs(3, true),
            'job_responsabilities' => $this->faker->paragraphs(2, true),
            'requirements' => $this->faker->paragraphs(2, true),
        ];
    }
}
