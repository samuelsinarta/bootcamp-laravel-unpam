<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produkmodel>
 */
class ProdukmodelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "kodeproduk" => $this->faker->unique()->numerify('####'),
            "namaproduk" => $this->faker->words(2,true),
            "harga"      => $this->faker->numerify('###000'),
            "jmlstok"    => $this->faker->numberBetween(10,100),
            "kategoriid" => $this->faker->numberBetween(1,3)
        ];
    }
}
