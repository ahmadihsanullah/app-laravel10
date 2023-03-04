<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idstudents' => rand(1, 9999999),
            'fullname' => fake()->name(),
            'gender' => 'M',
            'address' => '',
            'email' => fake()->unique()->safeEmail(),
            'phone' => rand(1, 9999999999)
        ];
    }
}
