<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropForeignUserIdrol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function($table) {
        $table->dropForeign('users_idrol_foreign');
        $table->foreign('idrol')->references('id')->on('rols');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function($table) {
        $table->dropForeign('users_idrol_foreign');
        $table->foreign('idrol')->references('id')->on('rols');
      });
    }
}
