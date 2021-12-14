<?php
namespace App\Http\Livewire\Product;
use App\Models\Product as MyProduct;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Product extends Component
{
    public function addtocart($productid)
    {
        $price=MyProduct::where(['product_id'=>$productid])->pluck('product_price')->first();
        $userid=Auth::id();
        if($userid=='')
        {
        return redirect()->route('login');
        }
        else
        {
        $obj=new Cart;
        $obj->user_id=$userid;
        $obj->product_id=$productid;
        $obj->quantity=1;
        $obj->total=$price;
        $result=$obj->save();           
        if($result)
        {
        $this->dispatchBrowserEvent('addedtocart');    
        }
    }
}
    public function render()
    {
        $products=MyProduct::inRandomOrder()->paginate(12);
        return view('livewire.product.product',['products'=>$products]);
    }
}
