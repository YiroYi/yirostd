<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersTableMissingColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('users', function($table) {
        $table->string('access_user')->unique();
        $table->string('last_name');
        $table->string('phone');
        $table->integer('age');
        $table->boolean('status')->default(1);
        $table->boolean('sex')->default(1);
        $table->integer('idrol')->unsigned();
        $table->foreign('idrol')->references('id')->on('users');

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
        $table->dropColumn('access_user');
        $table->dropColumn('last_name');
        $table->dropColumn('phone');
        $table->dropColumn('age');
        $table->dropColumn('status');
        $table->dropColumn('sex');
        $table->dropColumn('idrol');
        $table->dropForeign('lists_idrol_foreign');
      });
    }
}
