<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id');
            $table->integer('org_id')->unsigned()->comment('單位編號');
            $table->string('name')->comment('使用者名稱');
            $table->date('birthday')->nullable()->comment('生日');
            $table->string('email')->comment('電子郵件');
            $table->string('account')->unique()->comment('使用帳號');
            $table->string('password')->nullable()->comment('使用密碼');
            $table->integer('status')->default(0)->comment('狀態【0=未啟用、1=啟用、2=停用、3=黑名單、9=假刪除');
            $table->timestamps();
            $table->foreign('org_id')->references('id')->on('orgs')->onDelete('cascade');
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
