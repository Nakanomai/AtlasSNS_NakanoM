<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('username')->null()->comment('ユーザー名');
            $table->string('mail',255)->unique()->null()->comment('メールアドレス');
            $table->string('password',255)->comment('ログインパス');
            $table->string('bio',400)->nullable()->comment('自己紹介');
            $table->string('images',255)->default('Atlas.png')->comment('ユーザーアイコン');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
