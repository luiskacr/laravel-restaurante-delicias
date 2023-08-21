<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('client')->references('id')->on('clients');
            $table->date('date');
            $table->foreignId('payment_type')->references('id')->on('payment_types');
            $table->string('cart_name')->nullable();
            $table->string('cart_number')->nullable();
            $table->string('cart_expiration')->nullable();
            $table->float('subTotal');
            $table->float('taxes');
            $table->float('total');
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
};
