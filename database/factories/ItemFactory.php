<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Feed;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'feed_id' => Feed::factory()->create(),
            'title' => $this->faker->sentence,
            'author' => $this->faker->name,
            'content' => $this->faker->text,
            'url' => $this->faker->url,
        ];
    }
}
