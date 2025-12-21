<?php

namespace Database\Factories;

use App\Models\employer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmployerFactory extends Factory
{
    protected $model = employer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'email_adress' => $this->faker->unique()->companyEmail,
            'password' => Hash::make('password'),
            'Established_In' => $this->faker->year,
            'type' => $this->faker->randomElement(['Private', 'Public', 'Startup', 'NGO']),
            'logo_url' => 'logo1.png', // Default image from public/image
            'website_url' => $this->faker->url,
            'city' => $this->faker->city,
            'street' => $this->faker->streetAddress,
            'zip_code' => $this->faker->randomNumber(5),
            'country' => $this->faker->country,
            'phone' => $this->faker->randomNumber(8),
            'company_bg' => 'default_bg.jpg',
            'service' => $this->faker->bs,
            'Expertise' => $this->faker->catchPhrase,
        ];
    }
}
