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
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->text('html_description');
            $table->foreignId('maker_id')->nullable();
            $table->string('rakuten_link')->nullable();
            $table->string('amazon_link')->nullable();
            $table->string('yahoo_link')->nullable();
            $table->string('image')->nullable();
            $table->double('average_satisfaction')->default(0);
            $table->double('comfort')->default(0);
            $table->double('quietness')->default(0);
            $table->double('lightness')->default(0);
            $table->double('stability')->default(0);
            $table->double('longavity')->default(0);
            $table->tinyInteger('status')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
