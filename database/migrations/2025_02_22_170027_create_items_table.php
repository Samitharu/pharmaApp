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
            $table->id('product_id')->index();
            $table->string('product_code')->unique();
            $table->string('product_name');
            $table->integer('supplier_id');
            $table->string('pack_size')->nullable();
            $table->string('generic_name')->nullable();
            $table->string('description')->nullable();
            $table->boolean('status');
            $table->string('barcode')->nullable();
            $table->boolean('free_offer_allowed');
            $table->boolean('discount_allowed');
            $table->boolean('manage_batch');
            $table->decimal('whole_sale_price',15,2)->nullable();
            $table->decimal('retail_price',15,2)->nullable();
            $table->decimal('purchase_price',15,2)->nullable();
            $table->string('image',255)->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
