<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reader>
 */
class ReaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender=['male','female'];
        return [
            'reg_no' => random_int(100,900),
            'name' => $this->faker->name,
            'age' => random_int(18,80),
            'gender' => $gender[random_int(0,1)],
            'email' => $this->faker->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'class' => $this->faker->sentence(3)
        ];
    }
}
