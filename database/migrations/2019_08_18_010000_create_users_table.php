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
            $table->increments('id');
            $table->string('name', 70);
            $table->string('email', 50)->unique();
            $table->string('password', 200);
            $table->smallInteger('role')->default(2); // 0:Admin | 1:Support | 2:Client

            $table->integer('selected_project_id')->unsigned()->nullable();
            $table->foreign('selected_project_id')->references('id')->on('projects');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
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
