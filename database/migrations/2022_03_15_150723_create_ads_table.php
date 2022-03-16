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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('brand');
            $table->string('model');
            $table->integer('health',3);
            $table->boolean('condition');
            $table->boolean('status')->default(false);
            $table->string('location');
            $table->string('specifications');
            $table->integer('price');
            $table->string('images');
            $table->boolean('is_negotiable')->default(False);
            $table->unsignedBigInteger('seller_id');
            $table->unsignedBigInteger('category_id');
            $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('ads');
    }
};
