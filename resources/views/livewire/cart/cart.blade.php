<div>
<link rel="stylesheet" type="text/css" href="{{asset('Asset/custom/css/cart_index.css')}}">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="cart-container">
<div class="cart-head">
<div class="table-responsive table-bordered">
<table class="table table-borderless">
<thead>
<tr>
<th class="text-center">ID</th>
<th class="text-center">Name</th>
<th class="text-center">Image</th>
<th class="text-center">Quantity</th>
<th class="text-center">Price</th>
<th class="text-center">Total</th>
<th colspan="2" class="text-center">Action</th>
</tr>
</thead>
<tbody>
@if($items)
@foreach($items as $item)
<tr>
<td class="text-center">{{$item->cart_id}}</td>
<td class="text-center">{{$item->product_title}}</td>
<td class="text-center"><img src="{{asset($item->product_image)}}" class="img-thumbnail" style="height: 50px; !important;"></td>

<td>
<input type="number" cart_id="{{$item->cart_id}}" class="form-control form-control-sm quantity" pid="{{$item->product_id}}" id="quantity-{{$item->product_id}}" style="margin-bottom:5px;" min="1" step="1" value="1">
</td>

<td>
<input type="number" class="form-control form-control-sm price" pid="{{$item->product_id}}" id="price-{{$item->product_id}}" disabled="true" value="{{$item->product_price}}" style="margin-bottom:5px;">
</td>

<td>
<input type="number" class="form-control form-control-sm total" pid="{{$item->product_id}}" id="total-{{$item->product_id}}" disabled="true" value="{{$item->product_price}}" style="margin-bottom:5px;">
</td>

<td>
<a href="#" class="btn btn-warning" wire:click.prevent="updatecartitem({{$item->cart_id}})">
<span class="fa fa-edit"></span>    
</a>
</td>
<td>
<a href="#" class="btn btn-danger" wire:click.prevent="deletecartitem({{$item->cart_id}})">
<span class="fa fa-trash"></span>
</a>
</td>
</tr>
@endforeach
@endif
</tbody>
</table>
</div>
</div>
<style type="text/css">
.btn.btn-skew {
-webkit-transform: skew(-15deg);
transform: skew(-15deg)
}

#goback,
#order {
width: 200px;
border-radius: 2px;
text-transform: capitalize;
font-size: 15px;
padding: 10px 19px;
cursor: pointer;
color: #fff
}
</style>
<div class="cart-body">
<div class="row">
<div class="col-md-3">
<a id="goback" href="{{route('product.index')}}" class="btn btn-danger btn-skew">Go Back To Homepage</a>
</div>
<div class="col-md-3">
<a href="{{route('order.index')}}" id="order" class="btn btn-warning btn-skew">Proceed Transaction </a>
</div>
<div class="col-md-6">
<div class="order-total table-responsive ">
<table class="table table-borderless text-right">
<tbody>
<tr>
<td>Total Amount :</td>
<td>
<p id="total">
</p>
{{$total}}
</td>
</tr>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
$("body").delegate(".quantity","keyup",function(){
var pid=$(this).attr('pid');
var quantity=$("#quantity-"+pid).val();
var price=$("#price-"+pid).val();
var total=(quantity*price);
$("#total-"+pid).val(total);
});
});
</script>
<script>
$(document).ready(function(){
$("body").delegate(".quantity","mouseout",function(){
var pid=$(this).attr('pid');
var quantity=$("#quantity-"+pid).val();
var price=$("#price-"+pid).val();
var total=(quantity*price);
$("#total-"+pid).val(total);
});
});
</script>

<script>
$(document).ready(function(){
var sum_value = 0;
$('.total').each(function(){
sum_value += +$(this).val();
$('#total_value').val(sum_value);
})
$('#total').text(sum_value);
});
</script>

<script>
$('body').delegate('.quantity','focusout',function(e){
event.preventDefault();
var quantity=$(this).val();
var cartid=$(this).attr('cart_id');
window.livewire.emit('quantity',quantity,cartid);
});
</script>
<script>
window.addEventListener('cartupdated',function(){
let timerInterval
Swal.fire({
title: 'Auto close alert!',
html: 'I will close in <b></b> milliseconds.',
timer: 1000,
timerProgressBar: true,
didOpen: () => {
Swal.showLoading()
const b = Swal.getHtmlContainer().querySelector('b')
timerInterval = setInterval(() => {
b.textContent = Swal.getTimerLeft()
}, 100)
},
willClose: () => {
clearInterval(timerInterval)
}
}).then((result) => {
/* Read more about handling dismissals below */
if (result.dismiss === Swal.DismissReason.timer) {
console.log('I was closed by the timer')
}
})
});
</script>
