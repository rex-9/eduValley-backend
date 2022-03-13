<?php

namespace Database\Factories;

use App\Models\Freevideo;
use Illuminate\Database\Eloquent\Factories\Factory;

class FreevideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Freevideo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->title,
            "url" => $this->faker->url,
            "course_id" => rand(1, 20),
        ];
    }
}
