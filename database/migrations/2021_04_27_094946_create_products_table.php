<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('masp')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('price');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('productcat_id')->nullable();
            $table->foreign('productcat_id')->references('id')->on('productcats')->onDelete('cascade');//Thiết lập khóa ngoại cho bảng xóa du lieu ca 2 bang
            $table->string('status')->nullable();
            $table->string('the_firm',50)->nullable();
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
        Schema::dropIfExists('products');
    }
}
