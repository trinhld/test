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
        Schema::table('users', function (Blueprint $table) {
            $table->tinyInteger('category')->comment('種別');
            $table->tinyInteger('deleted_at')->nullable()->comment('削除フラグ');
            $table->string('deleted_user')->nullable()->comment('削除者');
            $table->string('created_user',50)->comment('作成者');
            $table->string('updated_user',50)->comment('更新者');
            $table->timestamp('last_login')->nullable()->comment('最終ログイン');
            $table->timestamp('created_at')->useCurrent()->comment('作成日');
            $table->timestamp('updated_at')->useCurrent()->comment('更新日');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->dropColumn('deleted_at');
            $table->dropColumn('deleted_user');
            $table->dropColumn('created_user');
            $table->dropColumn('updated_user');
            $table->dropColumn('last_login');
        });
    }
};
