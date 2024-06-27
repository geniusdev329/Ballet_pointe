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
            $table->double('average_satisfaction');
            $table->double('comfort');
            $table->double('quiteness');
            $table->double('lightness');
            $table->double('stability');
            $table->double('longavity');
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
