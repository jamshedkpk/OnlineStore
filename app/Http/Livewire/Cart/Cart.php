<?php
namespace App\Http\Livewire\Cart;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Cart as MyCart;

class Cart extends Component
{
public function render()
{
$userid=Auth::id();
$carts=MyCart::all();
$items=DB::table('carts')
->join('products','carts.product_id','=','products.product_id')
->where('carts.user_id','=',$userid)
->select('products.*','carts.cart_id as cart_id')
->get();
return view('livewire.cart.cart',['items'=>$items]);
}

// To delete an item from the cart
public function deletecartitem($id)
{
$obj=MyCart::find($id);
$result=$obj->delete();
}

// To update an item in cart
protected $listeners=['quantity'=>'setquantity'];
public function searchitems()
{
dd('here');   
}
public $cartid;
public $quantity=1;
public $total;
// To set quantity of cart item
function setquantity($quantity,$cartid)
{
$userid=Auth::id();
$this->quantity=$quantity;
$this->cartid=$cartid;    
}
// To update an item in the cart
function updatecartitem($cartid)
{
$obj=MyCart::find($cartid);
$productid=MyCart::where(['cart_id'=>$cartid])->pluck('product_id')->first();
$price=Product::where(['product_id'=>$productid])->pluck('product_price')->first();
$obj->quantity=$this->quantity;
$obj->total=$price*$obj->quantity;
$result=$obj->save();
if($result)
{
$this->dispatchBrowserEvent('cartupdated');    
$userid=Auth::id();
$total = DB::table('carts')->sum('total');
$this->reset();
$this->total=$total;
}
}
}
