<?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
public function index(Request $request)
{
if($request->path()=='admin-product')
{
$prodcts=Product::InRandomOrder()->paginate(12);
return view('admin.product.product_index');
}
else
{
$products=Product::inRandomOrder()->paginate(12);
return view('product.product_index',['products'=>$products]);
}
}
public function create()
{
return view('admin.product.product_create');
}

public function store(Request $request)
{
if($request->submit=='submit')
{
echo 'form will be used';
}
else if($request->submit=='api')
{
$apikey="dbde46a0fcmsh17733f44c1ca24fp1de2b7jsnd69a6c96a9d7";
$url="https://fakestoreapi.com/products";
$products=Http::get($url)->json();
foreach($products as $product)
{
$title=$product['title'];
$price=$product['price'];
$description=$product['description'];
$catagory=$product['category'];
$image=$product['image'];
$obj=new Product;
$obj->product_title=$title;
$obj->product_price=$price;
$obj->product_description=$description;
$obj->catagory_title=$catagory;
$obj->product_image=$image;
$obj->save();
}
return redirect()->route('admin-product.index');
}
}
public function show($id)
{
$product=Product::find($id);
return view ('product.product_show',['product'=>$product]);
}
public function edit(Product $product)
{
foreach($products as $product)
{
$title=$product['title'];
$price=$product['price'];
$description=$product['description'];
$catagory=$product['category'];
$image=$product['image'];
$obj=new Product;
$obj->product_title=$title;
$obj->product_price=$price;
$obj->product_description=$description;
$obj->catagory_title=$catagory;
$obj->product_image=$image;
$obj->save();
}

}
public function update(Request $request, Product $product)
{
}
public function destroy(Product $product)
{
}
public function search(Request $request)
{
$products = Product::where('product_title','LIKE','%'.$request->search.'%')->inRandomOrder()->paginate();
return view('product.product_index',['products'=>$products]);
}
}
