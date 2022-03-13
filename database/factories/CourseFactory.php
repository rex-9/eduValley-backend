<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "grade" => $this->faker->numberBetween(1, 10),
            "subject" => $this->faker->word,
            "image" => $this->faker->url,
            "token" => $this->faker->word,
            "price" => $this->faker->randomNumber(),
            "students" => $this->faker->randomNumber(),
            "teacher_id" => rand(1, 20),
        ];
    }
}
