<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
public function up()
{
Schema::create('carts', function (Blueprint $table) {
$table->bigIncrements('cart_id');
$table->bigInteger('user_id');
$table->bigInteger('product_id');
$table->bigInteger('quantity')->default(1);
$table->decimal('total',9,3);
});
}
public function down()
{
Schema::dropIfExists('carts');
}
}
