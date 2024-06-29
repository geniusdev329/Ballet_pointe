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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nickname')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('gender', ['男性', '女性', '回答しない'])->nullable();
            $table->tinyInteger('age')->unsigned();
            $table->tinyInteger('ballet_career')->unsigned();
            $table->enum('ballet_level', ['入門～初級者', '初級～中級者', '中級～上級者', 'プロレベル'])->nullable();
            $table->enum('foot_shape', ['エジプト型', 'ギリシャ型', 'スクエア型'])->nullable();
            $table->integer('foot_size')->unsigned();
            $table->enum('foot_width', ['広め', 'ふつう', '狭め'])->nullable();
            $table->enum('foot_height', ['高め', 'ふつう', '低め'])->nullable();
            $table->enum('mail_magazin', ['する', 'しない'])->nullable();
            $table->boolean('tos_confirm')->default(false);
            $table->boolean('privacy_policy_confirm')->default(false);
            $table->tinyInteger('type')->default(0); // Users: 0=>User, 1=>Admin, 2=>Manager
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
