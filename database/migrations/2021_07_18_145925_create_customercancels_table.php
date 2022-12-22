<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomercancelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customercancels', function (Blueprint $table) {
            $table->id();
            $table->string('fullname',100);
            $table->string('email',100);
            $table->string('address',200);
            $table->string('phone',50);
            $table->text('note',200);
            $table->unsignedBigInteger('subtotal');
            $table->string('payment_method',50);
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
        Schema::dropIfExists('customercancels');
    }
}
