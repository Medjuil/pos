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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->unique();
            $table->string('email')->unique();
            $table->string('mobile_no')->unique();
            $table->unsignedBigInteger('address_id');
            $table->string('status');
            $table->timestamps();

            $table->foreign('address_id')->references('id')->on('addresses')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shops');
    }
};
