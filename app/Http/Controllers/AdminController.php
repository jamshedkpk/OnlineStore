<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class AdminController extends Controller
{
public function index()
{
return view('admin.dashboard.dashboard');
}

public function create()
{
}
public function store(Request $request)
{
}
public function show($id)
{
}
public function edit($id)
{
}
public function update(Request $request, $id)
{
}
public function destroy($id)
{
}
}
