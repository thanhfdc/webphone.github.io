<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('masp')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->bigInteger('qty')->nullable();
            $table->unsignedBigInteger('subtotal')->nullable();
            $table->string('payment')->nullable();
            // $table->unsignedBigInteger('postcats_id');
            $table->unsignedBigInteger('customer_id');
            // $table->foreign('postcats_id')->references('id')->on('postcats')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');//Thiết lập khóa ngoại cho bảng xóa du lieu ca 2 bang
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
