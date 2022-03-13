<?php

namespace Database\Factories;

use App\Models\Upvote;
use Illuminate\Database\Eloquent\Factories\Factory;

class UpvoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Upvote::class;

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
