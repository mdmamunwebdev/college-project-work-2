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
        Schema::create('ordered_products', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('order_id');
            $table->tinyInteger('product_id');
            $table->tinyInteger('category_id');
            $table->bigInteger('product_qty');
            $table->double('sale_price');
            $table->double('total_price');
            $table->ipAddress('user_ip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordered_products');
    }
};
