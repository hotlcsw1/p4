<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class ConnectCarsAndUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            # FK - Create user_id
            $table->integer('user_id')->unsigned();
            
			# Connect FK to users table
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            # ref: http://laravel.com/docs/5.1/migrations#dropping-indexes
            $table->dropForeign('cars_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
