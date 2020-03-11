<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropCoachfeeColumnDetailsales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('detailsales', function (Blueprint $table) {
  $table->dropColumn('coach_fee');
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('detailsales', function (Blueprint $table) {
  $table->dropColumn('coach_fee');
});
    }
}
