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
            $table->integer('customer_id');
            $table->string('order_id');
            $table->float('coupon_value')->default(0);
            $table->string('shipping_charge')->default(0);
            $table->string('sub_total')->default(0);
            $table->enum('order_status',['pendding','on the way','cancelled','success'])->default('pendding');
            $table->string('payment_method');
            $table->enum('payment_status',['paid','unpaid'])->default('unpaid');
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
