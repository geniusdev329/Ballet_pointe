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
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned();
            $table->foreignId('product_id')->unsigned();
            $table->text('content');
            $table->double('purchase_size');
            $table->double('purchase_width');
            $table->double('shank');
            $table->integer('average_satisfaction');
            $table->integer('comfort');
            $table->integer('quiteness');
            $table->integer('lightness');
            $table->integer('stability');
            $table->integer('longavity');
            $table->tinyInteger('status')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_reviews');
    }
};
