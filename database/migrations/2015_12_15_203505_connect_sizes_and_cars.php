<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class ConnectSizesAndCars extends Migration
{
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
			# Create FK to size_id
            $table->integer('size_id')->unsigned();
			# Establish FK connection
            $table->foreign('size_id')->references('id')->on('sizes');
        });
    }
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign('cars_size_id_foreign');
            $table->dropColumn('size_id');
        });
    }
}
