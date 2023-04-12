<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->string('email');
            $table->enum('verification',['verify','not-verify'])->default('not-verify');
            $table->string('password');
            $table->string('photo')->nullable();
            $table->text('address')->nullable();
            $table->text('address2')->nullable();
            $table->text('country')->nullable();
            $table->text('city')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('mobile')->nullable();
            $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('sellers');
    }
}
