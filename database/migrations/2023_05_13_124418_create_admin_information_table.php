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
        Schema::create('admin_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_name',20)->comment('性');
            $table->string('first_name',20)->comment('名');
            $table->string('last_name_hiragana',20)->comment('性（ひらがな）');
            $table->string('first_name_hiragana',20)->comment('名（ひらがな）');
            $table->string('birth_date')->comment('生年月日');
            $table->string('phone',15)->nullable()->comment('電話番号');
            $table->tinyInteger('class')->comment('区分');
            $table->timestamp('cancel_at')->nullable()->comment('停止日');
            $table->string('created_user',50)->comment('作成者');
            $table->string('updated_user',50)->comment('更新者');
            $table->unsignedInteger('user_id')->comment('ログインユーザID');
            $table->string('profile_picture', 500)->nullable()->comment('自己紹介写真');
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
        Schema::dropIfExists('admin_information');
    }
};
