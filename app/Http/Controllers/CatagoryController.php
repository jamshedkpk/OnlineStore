<?php
namespace App\Http\Controllers;
use App\Models\Catagory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class CatagoryController extends Controller
{
public function index()
{
// Display catagories for admin
$catagories=Catagory::all();
return view('admin.catagory.catagory_index',['catagories'=>$catagories]);
}
public function create()
{
return view('admin.catagory.catagory_create');
}

public function store(Request $request)
{
// If admin wants to add a catagory manually
if($request->submit=="submit")
{
$name=$request->name;
$link=$request->link;
$obj=new Catagory;
$obj->catagory_name=$name;
$obj->catagory_link=$link;
$result=$obj->save();
if($result)
{
return redirect()->route('admin-catagory.index');    
}
}
// If Admin wants to add use an api service for adding catagories
else if($request->submit=="api")
{
$url="https://fakestoreapi.com/products/categories";
$apikey="dbde46a0fcmsh17733f44c1ca24fp1de2b7jsnd69a6c96a9d7";
$catagories=Http::get($url)->json();
$i=0;
$count=count($catagories);
for($i=0;$i<$count;$i++)
{
$obj=new Catagory;
$obj->catagory_name=$catagories[$i];
$result=$obj->save();
}
return redirect()->route('admin-catagory.index');
}
}
public function show(Catagory $catagory)
{
}
public function edit(Catagory $catagory)
{
}
public function update(Request $request, Catagory $catagory)
{
}
public function destroy(Catagory $catagory)
{
}
}
