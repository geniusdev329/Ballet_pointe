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
            $table->double('purchase_size')->default(0);
            $table->double('purchase_width')->default(0);
            $table->double('shank')->default(0);
            $table->integer('average_satisfaction')->default(0);
            $table->integer('comfort')->default(0);
            $table->integer('quietness')->default(0);
            $table->integer('lightness')->default(0);
            $table->integer('stability')->default(0);
            $table->integer('longavity')->default(0);
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
