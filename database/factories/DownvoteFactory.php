<?php

namespace Database\Factories;

use App\Models\Downvote;
use Illuminate\Database\Eloquent\Factories\Factory;

class DownvoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Downvote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "comment_id" => rand(1, 20),
            "user_id" => rand(1, 20),
        ];
    }
}
