@include('admin.dashboard.header')
<div class="container">
<div class="row">
<div class="col-md-6 offset-3">
@yield('catagory_index') 
@yield('catagory_create')
@yield('product_index') 
@yield('product_create')

</div>
</div> 
</div>
@include('admin.dashboard.footer')


