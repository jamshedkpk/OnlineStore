<?php
namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
public function index()
{
return view('cart.cart');
}
public function create()
{
}

public function store(Request $request)
{
$productid=$request->product_id;
$product=Product::find($productid);
$total=$product->product_price;
$userid=Auth::id();
$obj=new Cart;
$obj->user_id=$userid;
$obj->product_id=$productid;
$obj->total=$total;
$obj->save();
return back()->with('message','Item is successfully added to your Cart');
}

public function show(Cart $cart)
{
}

public function edit(Cart $cart)
{
}

public function update(Request $request, Cart $cart)
{
}

public function destroy($id)
{
}

static function items()
{
//take user id from session
$id=Auth::id();
$items=Cart::where(['user_id'=>$id])->count();
return $items;
}
}
