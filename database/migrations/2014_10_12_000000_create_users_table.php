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
            $table->increments('id')->unsigned();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('streetName');
            $table->string('houseNumber');
            $table->string('city');
            $table->string('country');


            $table->integer('log_id')->index()->unsigned();
            $table->foreign('log_id')->references('id')->on('logs')->onDelete('cascade');

            $table->string('email')->unique();
            $table->string('password');



            $table->softDeletes();
            $table->rememberToken();
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
