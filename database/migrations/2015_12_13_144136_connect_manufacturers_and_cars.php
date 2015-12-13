<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class ConnectManufacturersAndCars extends Migration
{
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
			# Create FK to manufacturer_id
            $table->integer('manufacturer_id')->unsigned();
			# Establish FK connection
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers');
        });
    }
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign('cars_manufacturer_id_foreign');
            $table->dropColumn('manufacturer_id');
        });
    }
}
