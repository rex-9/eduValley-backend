<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "fileName" => $this->faker->url,
            "thumbName" => $this->faker->url,
            "title" => $this->faker->url,
            "parent" => $this->faker->url,
            "course_id" => rand(1, 20),
        ];
    }
}
