<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            // You might want to store the product id if available.
            $table->unsignedBigInteger('product_id')->nullable();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}