<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQtyCustomerColumnToDetailsales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('detailsales', function($table) {
        $table->integer('qty_individual');
        $table->integer('qty_membership');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('detailsales', function($table) {
        $table->integer('qty_individual');
        $table->integer('qty_membership');
      });
    }
}
