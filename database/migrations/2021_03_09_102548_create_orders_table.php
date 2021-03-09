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
            $table->integer('user_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->integer('paying_amount')->nullable();
            $table->string('balance_transaction')->nullable();
            $table->string('stripe_order_id')->nullable();
            $table->integer('subtotal')->nullable();
            $table->integer('shipping')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('total')->nullable();
            $table->string('status')->nullable()->default(0);
            $table->string('month')->nullable();
            $table->string('date')->nullable();
            $table->string('year')->nullable();
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
