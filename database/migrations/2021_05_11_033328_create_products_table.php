<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
public function up()
{
Schema::create('products', function (Blueprint $table) {
$table->bigIncrements('product_id');
$table->string('product_title');
$table->bigInteger('product_price');
$table->text('product_description');
$table->string('catagory_title');
$table->string('product_image');
});
}
public function down()
{
Schema::dropIfExists('products');
}
}
