<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailsales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idsale')->unsigned();
            $table->foreign('idsale')->references('id')->on('sales')->onDelete('cascade');
            $table->integer('idactivity')->unsigned();
            $table->foreign('idactivity')->references('id')->on('activities');
            $table->integer('idcouch')->unsigned();
            $table->foreign('idcouch')->references('id')->on('couches');
            $table->integer('idcost')->unsigned();
            $table->foreign('idcost')->references('id')->on('costs');
            $table->integer('idschedule')->unsigned();
            $table->foreign('idschedule')->references('id')->on('schedules');
            $table->decimal('coach_fee',11,2);
            $table->decimal('membership_fee',11,2);
            $table->decimal('individual_fee',11,2);
            $table->decimal('cost_expense',11,2);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailsales');
    }
}
