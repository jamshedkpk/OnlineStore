<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
use AuthenticatesUsers;
protected $redirectTo = RouteServiceProvider::HOME;
public function __construct()
{
$this->middleware('guest')->except('logout');
}

/*
This function is used to check if user is admin then it will redirect to the admin dashboard else if it is a general user then it will redirect to the user dashboard.
*/
public function redirectTo()
{
$for = [
'admin' => 'admin',
'user'  => 'user',
];
return $this->redirectTo = route($for[auth()->user()->role]);
}
}
