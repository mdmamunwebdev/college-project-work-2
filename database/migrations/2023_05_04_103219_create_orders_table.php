<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('cus_firstName')->nullable();
            $table->string('cus_lastName')->nullable();
            $table->string('cus_userName')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('address2')->nullable();
            $table->string('cus_country')->nullable();
            $table->string('cus_state')->nullable();
            $table->string('cus_zip')->nullable();

            $table->string('ship_firstName')->nullable();
            $table->string('ship_lastName')->nullable();
            $table->string('ship_email')->nullable();
            $table->string('ship_phone')->nullable();
            $table->text('ship_address')->nullable();
            $table->text('ship_address2')->nullable();
            $table->string('ship_country')->nullable();
            $table->string('ship_state')->nullable();
            $table->string('ship_zip')->nullable();

            $table->date('order_create_date')->nullable();
            $table->date('tran_date')->nullable();
            $table->bigInteger('subtotal')->nullable();
            $table->double('shipping_fees')->nullable();
            $table->bigInteger('coupon_id')->nullable();
            $table->text('coupon_code')->nullable();
            $table->text('coupon_calculation')->nullable();
            $table->double('coupon_discount_price')->nullable();
            $table->string('card_issuer')->default('cash on');
            $table->string('card_brand')->default('cash on');
            $table->double('total')->nullable();
            $table->string('status')->nullable();
            $table->tinyInteger('order_status')->default(0);
            $table->tinyInteger('pay_method')->nullable();
            $table->tinyInteger('ship_method')->nullable();
            $table->date('ship_date')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('currency')->nullable();
            $table->tinyInteger('same_address')->nullable();
            $table->text('cus_notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
