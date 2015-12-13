<?php
use Illuminate\Database\Seeder;
class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lexus
        DB::table('manufacturers')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Lexus',
        'mfr_url' => 'http://www.lexus.com/',
        ]);

        // Toyota
        DB::table('manufacturers')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Toyota',
        'mfr_url' => 'http://www.toyota.com/',
        ]);

        // Honda
        DB::table('manufacturers')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Honda',
        'mfr_url' => 'http://automobiles.honda.com/',
        ]);

        // Jeep
        DB::table('manufacturers')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Jeep',
        'mfr_url' => 'http://www.jeep.com/en/',
        ]);

        // Honda
        DB::table('manufacturers')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'name' => 'Jaguar',
        'mfr_url' => 'http://www.jaguarusa.com/index.html',
        ]);
    }
}
