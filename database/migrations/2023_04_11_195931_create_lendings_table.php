<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lendings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lender_id');
            $table->unsignedBigInteger('borrower_id');
            $table->unsignedBigInteger('product_id');
            $table->boolean('returned')->default(false);
            $table->timestamps();

            $table->foreign('lender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('borrower_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lendings');
    }
};
