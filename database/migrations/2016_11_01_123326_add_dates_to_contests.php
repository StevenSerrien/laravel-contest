<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDatesToContests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('contests', function($table) {
        $table->dateTime('start_date');
        $table->dateTime('end_date');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('contests', function($table) {
      $table->dropColumn('start_date');
      $table->dropColumn('end_date');
      });
    }
}
