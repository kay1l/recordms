<?php

namespace Database\Factories;

use App\Models\College;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Program>
 */
class ProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $college = \App\Models\College::inRandomOrder()->first();
        return [
            'programName' => $this->faker->word,
            'collegeCode' => $college->collegeCode,
            'status' => $college->status,
               
        ];
    }
}
