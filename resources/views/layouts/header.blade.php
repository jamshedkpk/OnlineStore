<?php
use App\Http\Controllers\CartController;
$items=CartController::items();
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
@livewireStyles
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>
Welcome	
</title>

<link rel="stylesheet" type="text/css" href="{{asset('Asset/css/bootstrap.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Asset/css/bootstrap3.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Asset/icons/all.css')}}">

<script type="text/javascript" src="{{asset('Asset/js/JQuery.js')}}">
</script>

<script type="text/javascript" src="{{asset('Asset/js/bootstrap3.min.js')}}">
</script>

<script type="text/javascript" src="{{asset('Asset/js/popper.min.js')}}">
</script>

<script type="text/javascript" src="{{asset('Asset/icons/all.js')}}"></script>

<link rel="stylesheet" type="text/css" href="{{asset('Asset/custom/css/home.css')}}">

<script type="text/javascript" src="{{asset('Asset/custom/js/header.js')}}"></script>
 
 </head>
<body>
<!--navbar for shopping cart-->
<div id="flipkart-navbar">
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">
                <li class="upper-links"><a class="links" href="{{route('product.index')}}">
                <strong>
                Home    
                </strong>    
                </a>
                </li>
                <li class="upper-links"><a class="links" href="{{route('product.index')}}">
                <strong>
                Products   
                </strong>    
                </a>
                </li>
                @guest
                <li class="upper-links dropdown"><a class="links" href="http://clashhacks.in/">
                <strong>
                Account
                </strong>    
            </a>
                    <ul class="dropdown-menu">
                        <li class="profile-li">
                            @if(Route::has('login'))
                            <a class="profile-links" href="{{route('login')}}">
                        <strong>
                        LogIn               </strong>
                        </a>
                        @endif
                    </li>
                        <li class="profile-li">
                        @if(Route::has('register'))
                            <a class="profile-links" href="{{route('register')}}">
                            <strong>
                                Register
                            </strong>
                        </a>
                        @endif
                    </li>
                    </ul>
                </li>
                @else
                 <li class="upper-links dropdown"><a class="links" href="http://clashhacks.in/">
                    <strong>
                  Profile      
                    </strong>
                 </a>
      <ul class="dropdown-menu">
    <li class="profile-li"><a class="profile-links" href="http://yazilife.com/">
<strong>
   Edit Profile 
</strong>
    </a></li>
       <li class="profile-li"><a class="profile-links" href="http://yazilife.com/">
        <strong>
       Change Password     
        </strong>
       </a></li>
    
<li class="profile-li">
@if(Route::has('logout'))
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
<strong>
Log Out
</strong>
</a>
@endif
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form>    
</li>
@endauth
                    </ul>
                </li>
            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()">☰ Brand</span></h2>
                <h1 style="margin:0px;"><span class="largenav">Brand</span></h1>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                <form method="post" id="searchdata" action="{{route('search')}}">
                <div class="row">
                    @csrf
                    <input class="flipkart-navbar-input col-xs-11 text-dark" placeholder="Search for Products, Brands and more" id="search" name="search">
                    <button class="flipkart-navbar-button col-xs-1">
                        <svg width="15px" height="15px">
                            <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                        </svg>
                    </button>
                </div>
            </div> </form>
            @livewire('cart.qart-items')
        </div>
    </div>
</div>
<div id="mySidenav" class="sidenav">
    <div class="container" style="background-color: #2874f0; padding-top: 10px;">
        <span class="sidenav-heading">Home</span>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
</div>
<!-- end of navbar for shopping cart-->
	
