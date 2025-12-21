<?php

namespace Database\Factories;

use App\Models\candidate;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class CandidateFactory extends Factory
{
    protected $model = candidate::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('password'), // default password
            'job_title' => $this->faker->jobTitle,
            'price_wish' => $this->faker->numberBetween(3000, 20000) . ' DH',
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'city' => $this->faker->city,
            'street' => $this->faker->streetAddress,
            'zip_code' => $this->faker->randomNumber(5),
            'country' => $this->faker->country,
            'phone' => $this->faker->randomNumber(8), // Keep within 32-bit integer range
            'about' => $this->faker->paragraph,
            'img_url' => 'default_avatar.png',
            'resume' => 'resume.pdf',
        ];
    }
}
