<?php
namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
public function index()
{
$orders=Cart::all();
return view('order.order',['orders'=>$orders]);
}
public function create()
{
}
public function store(Request $request)
{
}
public function show(Order $order)
{
}
public function edit(Order $order)
{
}
public function update(Request $request, Order $order)
{
}
public function destroy(Order $order)
{
}
}
