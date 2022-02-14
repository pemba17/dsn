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
            $table->integer('product_id');
            $table->integer('user_id');
            $table->string('customer_name');
            $table->string('customer_contact_no');
            $table->integer('quantity')->default(1);
            $table->integer('cod');
            $table->integer('prepaid_amount')->default(0.00);
            $table->integer('cities');
            $table->string('area')->nullable();
            $table->text('delivery_instructions')->nullable();
            $table->string('order_status')->default('confirmed');
            $table->integer('product_variation_id')->nullable();
            $table->timestamps('confirmed_at')->nullable();
            $table->timestamps('dispatched_at')->nullable();
            $table->timestamps('delivered_at')->nullable();
            $table->timestamps('returned_at')->nullable();
            $table->timestamps('cancelled_at')->nullable();
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
