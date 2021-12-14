<div>
<div>
<!-- This file is used to fetch all products data from database and show in front of users-->
<link rel="stylesheet" type="text/css" href="{{asset('Asset/custom/css/product_index.css')}}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
font-family: 'Varela Round', sans-serif;
}
.modal-confirm {		
color: #636363;
width: 325px;
font-size: 14px;
}
.modal-confirm .modal-content {
padding: 20px;
border-radius: 5px;
border: none;
}
.modal-confirm .modal-header {
border-bottom: none;   
position: relative;
}
.modal-confirm h4 {
text-align: center;
font-size: 26px;
margin: 30px 0 -15px;
}
.modal-confirm .form-control, .modal-confirm .btn {
min-height: 40px;
border-radius: 3px; 
}
.modal-confirm .close {
position: absolute;
top: -5px;
right: -5px;
}	
.modal-confirm .modal-footer {
border: none;
text-align: center;
border-radius: 5px;
font-size: 13px;
}	
.modal-confirm .icon-box {
color: #fff;		
position: absolute;
margin: 0 auto;
left: 0;
right: 0;
top: -70px;
width: 95px;
height: 95px;
border-radius: 50%;
z-index: 9;
background: #82ce34;
padding: 15px;
text-align: center;
box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-confirm .icon-box i {
font-size: 58px;
position: relative;
top: 3px;
}
.modal-confirm.modal-dialog {
margin-top: 80px;
}
.modal-confirm .btn {
color: #fff;
border-radius: 4px;
background: #82ce34;
text-decoration: none;
transition: all 0.4s;
line-height: normal;
border: none;
}
.modal-confirm .btn:hover, .modal-confirm .btn:focus {
background: #6fb32b;
outline: none;
}
.trigger-btn {
display: inline-block;
margin: 100px auto;
}
</style>
<script type="text/javascript">
$(document).ready(function(){
$('#myModal').modal('toggle');
$('#myModal').modal('show');
$('#myModal').modal('fadeOut');
});	
</script>
<!-- Start container for message box when item is added to cart-->
<br>
<div class="container-fluid">
<div class="row">
<div class="col-md-6 col-sm-6 offset-3">
@if(Session::has('message'))
<div class="text-center">
</div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
<div class="modal-dialog modal-confirm">
<div class="modal-content">
<div class="modal-header">
<div class="icon-box">
<i class="material-icons">&#xE876;</i>
</div>				
<h4 class="modal-title w-100">Awesome!</h4>	
</div>
<div class="modal-body">
<p class="text-center">
{{Session::get('message')}}	
</p>
</div>
<div class="modal-footer">
<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
</div>
</div>
</div>
</div>     
@endif	
</div>
</div>
<!-- End of container for message box when item is added to cart-->

<!-- Start of container displaying products-->
<div class="container-fluid">
<div class="row">
@if($products)
@foreach($products as $item)
<div class="col-md-3 col-sm-6">
<div class="product-grid4">
<div class="product-image4">
<a href="{{route('product.show',$item['product_id'])}}">
<img class="pic-1" src="{{asset($item['product_image'])}}">
<img class="pic-2" src="{{asset($item['product_image'])}}">
</a>
<ul class="social">
<li><a href="{{route('product.show',$item['product_id'])}}" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
<li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
<li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
</ul>
<span class="product-discount-label">-12%</span>
</div>
<div class="product-content">
<h3 class="title"><a href="{{route('product.show',$item['product_id'])}}">
<?php
$string=$item['product_title'];
$new=substr($string,0,20);
echo($new);
?>
</a></h3>
<div class="price">
PRK : {{$item['product_price']}}
</div>
<!-- If user wants to add some items before login then he should redirect to login -->
@guest
<input type="hidden" name="product_id" value="{{$item['product_id']}}">
<button wire:click.prevent="addtocart({{$item->product_id}})" id="addtocart"  class="btn btn-danger btn-block">
Add To Cart	
</button>
@else
<!-- If user is login then he can store items to a cart-->
<button wire:click.prevent="addtocart({{$item->product_id}})" id="addtocart"  class="btn btn-danger btn-block addtocart">
Add To Cart	
</button>
@endauth
</div>
</div>
</div>
@endforeach
@endif
<center>
{{ $products->links() }}
</center>
</div>
</div>	
</div>
<!-- End of container displaying products-->
</div>
<script>
window.addEventListener('addedtocart',function(){
let timerInterval
Swal.fire({
title: 'Auto close alert!',
html: 'I will close in <b></b> milliseconds.',
timer: 500,
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
</div>
