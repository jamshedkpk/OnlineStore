<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatagoriesTable extends Migration
{
public function up()
{
Schema::create('catagories', function (Blueprint $table) {
$table->bigIncrements('catagory_id');
$table->string('catagory_name');
});
}

public function down()
{
Schema::dropIfExists('catagories');
}
}
