<?php

namespace Database\Factories;

use App\Models\Beverage;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeverageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Beverage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dirnks_typ = array('soft drinks', 'alchoholic', 'juice');
        return [
            'name' => $this->faker->word,
            'type' => $dirnks_typ[rand(0,2)]
        ];
    }
}
