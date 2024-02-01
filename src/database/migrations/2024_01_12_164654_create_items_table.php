<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->unsignedBigInteger('condition_id');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->string('brand_name')->nullable();
            $table->integer('price');
            $table->text('item_detail');
            $table->string('image_url');
            $table->timestamps();

            $table->foreign('seller_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('condition_id')->references('id')->on('conditions');
            $table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
