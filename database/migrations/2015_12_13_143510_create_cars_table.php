<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            // Ten Fields: id, model, style, year, picture,
            // purchase_link, created_at and updated_at
            // FKs (manufacturer_id and user_id) are created with the connect scripts
            $table->increments('id');
            $table->string('model');
            $table->string('style');
            $table->integer('year');
            $table->integer('price');
            $table->integer('miles');
            $table->string('picture');
            $table->string('purchase_link');
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
        Schema::drop('cars');
    }
}
