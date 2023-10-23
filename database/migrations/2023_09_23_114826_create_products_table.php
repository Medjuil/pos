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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->unique();
            $table->string('code')->unique();
            $table->string('barcode')->unique();
            $table->string('cost');
            $table->string('markup');
            $table->boolean('fixed_markup')->default(false);
            $table->string('stock');
            $table->string('unit');
            $table->string('unit_value');
            $table->string('expiration_date');
            $table->string('description');
            $table->unsignedBigInteger('shop_id');
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->unsignedBigInteger('product_category_id');
            $table->timestamps();

            $table->foreign('shop_id')->references('id')->on('shops')->onUpdate('cascade');
            $table->foreign('tax_id')->references('id')->on('taxes')->onUpdate('cascade');
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
