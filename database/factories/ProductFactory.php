<?php
namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
protected $model = Product::class;
public function definition()
{
return
[
'product_title'=>$this->faker->name(),
'product_price'=>random_int(500,1000),
'product_description'=>$this->faker->sentence(),
'catagory_name'=>$this->faker->name(),
'product_image'=>'storage/image (1).jpg',
];
}
}
