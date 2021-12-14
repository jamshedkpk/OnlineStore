<!-- This file is used to fetch one product and show its detail to user -->

@extends('layouts.app')
@section('product_show')
<link rel="stylesheet" type="text/css" href="{{asset('Asset/custom/css/product_show.css')}}">

<div class="container">
<div class="card">
<div class="container-fliud">

<div class="wrapper row">
@if($product)
<div class="preview col-md-6">
<div class="preview-pic tab-content">
<div class="tab-pane active" id="pic-1"><img src="{{asset($product['product_image'])}}"/></div>
</div>
</div>
<div class="details col-md-6">
<h4 class="product-title">
{{$product['product_title']}}
</h4>
<p class="product-description">
    {{$product['product_description']}}
</p>
<h4 class="price">current price: <span>
{{$product['product_price']}}
$
</span></h4>
<br>
<!-- If user wants to add some items before login then he should redirect to login -->		
@guest
<button class="btn btn-danger btn-block btn-skew">Add To Cart </button>
<!-- If user is login then he can store items to a cart-->
@else
<form method="post" action="{{route('cart.store')}}">
@csrf
<input type="hidden" name="product_id" value="{{$product['product_id']}}">
<button id="order" class="btn btn-danger btn-block btn-skew">Add To Cart </button>
</form>
@endauth

</div>
@endif
</div>
</div>
</div>
</div>

@endsection