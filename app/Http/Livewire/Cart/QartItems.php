<?php
namespace App\Http\Livewire\Cart;
use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class QartItems extends Component
{
public $items;
public function render()
{
$userid=Auth::id();
$this->items=Cart::where(['user_id'=>$userid])->count();
return view('livewire.cart.qart-items');
}
}
