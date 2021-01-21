<?php

namespace Database\Factories;

use App\Models\Foods;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Foods::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $types = ['food', 'drink'];
        $isAvailable = [true, false];
        return [
            'name' => $this->faker->name,
            'type' =>  $types[rand(0, 1)],
            'price' => (rand(8, 45) * 1000),
            'stock'=> rand(30, 100),
            'is_available' => $isAvailable[rand(0,1)],
        ];
    }
}
