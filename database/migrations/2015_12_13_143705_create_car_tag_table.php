<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateCarTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_tag', function (Blueprint $table) {
            # Five fields: id, created_at, updated_at
            # FKs: car_id and tag_id
            $table->increments('id');
            $table->timestamps();
            $table->integer('car_id')->unsigned();
            $table->integer('tag_id')->unsigned();

            # Establish foreign keys
            $table->foreign('car_id')->references('id')->on('cars');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('car_tag');
    }
}
