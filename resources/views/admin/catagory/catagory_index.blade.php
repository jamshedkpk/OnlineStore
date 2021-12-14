@extends('admin.dashboard.layout')
@section('catagory_index')
<style>
table tr td, table tr th
{
text-align: center;	
}	
</style>
<br>
<a class="btn btn-success float-right" href="{{route('admin-catagory.create')}}">
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
@if($catagories)
@foreach($catagories as $catagory)
<tr>
<td>
{{$catagory['catagory_id']}}    
</td>
<td>
{{$catagory['catagory_name']}}    
</td>
<td>
<span class="fa fa-edit"></span>    
</td>
<td>
<span class="fa fa-trash"></span>    
</td>
</tr>
@endforeach
@endif
</tbody>
</table>
@endsection