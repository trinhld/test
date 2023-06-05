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
        Schema::create('login_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('category')->comment('種別');
            $table->unsignedInteger('user_id')->comment('ユーザーID');
            $table->tinyInteger('login_result')->comment('ログイン結果');
            $table->string('created_user',50)->comment('作成者');
            $table->string('updated_user',50)->comment('更新者');
            $table->timestamp('created_at')->useCurrent()->comment('作成日');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_histories');
    }
};
