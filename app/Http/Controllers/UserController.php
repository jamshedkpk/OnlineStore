<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class UserController extends Controller
{
public function index()
{
    $products=Product::inRandomOrder()->paginate(12);
    return view('product.product_index',['products'=>$products]);
}
}
