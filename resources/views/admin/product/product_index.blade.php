@extends('admin.dashboard.layout')
@section('product_index')
<style>
table tr td, table tr th
{
text-align: center;	
}	
</style>
<br>
<a class="btn btn-success float-right" href="{{route('admin-product.create')}}">
Add New   
</a>
<br>
<br>
<table class="table table-bordered table-hover table-striped">
<thead>
<tr>
<th>
ID    
</th>
<th>
Name    
</th>
<th colspan="2">
Action    
</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>Mobiles</td>
<td>
<span class="fa fa-edit"></span>    
</td>
<td>
<span class="fa fa-trash"></span>    
</td>
</tr>
</tbody>
</table>
@endsection