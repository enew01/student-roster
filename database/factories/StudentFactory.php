<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'name'  => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'dob'   => $this->faker->dateTimeBetween('-25 years', '-15 years')->format('Y-m-d'),
        ];
    }
}
