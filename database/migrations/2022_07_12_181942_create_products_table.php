<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->LongText('description')->nullable();
            $table->LongText('return')->nullable();
            $table->LongText('aditional')->nullable();
            $table->string('stock')->default(0);
            $table->string('code');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('child_category_id')->nullable();
            $table->unsignedBigInteger('grand_child_category_id')->nullable();
            $table->integer('price')->default(0);
            $table->integer('sell_price')->default(0);
            $table->integer('discount')->default(0);
            $table->unsignedBigInteger('size_id')->nullable();
            $table->unsignedBigInteger('color_id')->nullable();
            $table->string('qty');
            $table->string('added_by_id')->nullable();
            $table->enum('condition',['new','feature','best-seller']);
            $table->string('photo');
            $table->enum('status',['active','inactive'])->default('active');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('child_category_id')->references('id')->on('sub_categories')->onDelete('SET NULL');
            $table->foreign('grand_child_category_id')->references('id')->on('grand_child_categories')->onDelete('SET NULL');
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
