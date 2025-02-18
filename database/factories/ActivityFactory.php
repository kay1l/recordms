<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class ActivityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Activity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $college = \App\Models\College::inRandomOrder()->first();
        $program = \App\Models\Program::inRandomOrder()->first();
        $year = $this->faker->year();
        $activity_code = $college->collegeCode . '-' . $year . '-' . Str::random(5);

          return [
            'activity_code' => $activity_code,
            'activity_name' => $this->faker->sentence,
            'collegeCode' => $college->collegeCode,
            'proponentId' =>$program->programId,
            'year' => $this->faker->numberBetween(2020, 2025),
            'budget' => $this->faker->randomFloat(2, 0, 100000),
            'status' => $this->faker->randomElement(['Pending', 'In Progress', 'Completed']),
            'moa_uploaded' => $this->faker->boolean ? $this->faker->word . '.pdf' : null,
            'proposal_uploaded' => $this->faker->boolean ? $this->faker->word . '.pdf' : null,
            'attendance_uploaded' => $this->faker->boolean ? $this->faker->word . '.pdf' : null,
            'evaluation_uploaded' => $this->faker->boolean ? $this->faker->word . '.pdf' : null,
            'terminal_uploaded' => $this->faker->boolean ? $this->faker->word . '.pdf' : null,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
