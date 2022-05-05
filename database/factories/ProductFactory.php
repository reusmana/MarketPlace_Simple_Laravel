<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory ;
use Faker\Generator as Faker;
use App\Models\Product;


class ProductFactory extends Factory{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' =>$this->faker->firstNameMale,
            'category_id' =>$this->faker->numberBetween(1, 5),
            'price' =>$this->faker->numberBetween(100000, 9000000),
            'desc' =>$this->faker->paragraph($nbSentences = 2, $variablenbSentences = true),
            'image' =>'/storage/images/product.jpg'
        ];
    }


}



