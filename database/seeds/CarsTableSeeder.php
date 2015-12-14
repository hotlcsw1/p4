<?php
use Illuminate\Database\Seeder;
class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Jaguar - F-Pace
        $manufacturer_id = \App\Manufacturer::where('name','=','Jaguar')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'F-Pace',
        'style' => 'Premium',
        'manufacturer_id' => $manufacturer_id,
        'user_id' => 1,
        'year' => 2016,
        'price' => 38999,
        'picture' => 'https://media.ed.edmunds-media.com/jaguar/f-pace/2017/oem/2017_jaguar_f-pace_4dr-suv_base_fq_oem_10_300.jpg',
        'purchase_link' => 'http://www.jaguarusa.com/all-models/f-pace/specifications/index.html',
        ]);

        // Jeep - Grand Cherokee
        $manufacturer_id = \App\Manufacturer::where('name','=','Jeep')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Grand Cherokee',
        'style' => 'Altitude',
        'manufacturer_id' => $manufacturer_id,
        'user_id' => 2,
        'year' => 2016,
        'price' => 34499,
        'picture' => 'https://media.ed.edmunds-media.com/jeep/grand-cherokee/2016/fe/2016_jeep_grand-cherokee_f34_fe_1106151_500.jpg',
        'purchase_link' => 'http://www.jeep.com/model-compare/detailed-chart/?modelYearCode=CUJ201503&variation=1',
        ]);

        // Honda - Accord Hybrid
        $manufacturer_id = \App\Manufacturer::where('name','=','Honda')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Accord Hybrid',
        'style' => 'Touring',
        'manufacturer_id' => $manufacturer_id,
        'user_id' => 2,
        'year' => 2016,
        'price' => 29600,
        'picture' => 'https://media.ed.edmunds-media.com/honda/accord-hybrid/2015/oem/2015_honda_accord-hybrid_sedan_touring_rq_oem_1_500.jpg',
        'purchase_link' => 'http://automobiles.honda.com/accord-hybrid/price.aspx',
        ]);

        // Lexus - IS
        $manufacturer_id = \App\Manufacturer::where('name','=','Lexus')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'IS',
        'style' => 'F Sport',
        'manufacturer_id' => $manufacturer_id,
        'user_id' => 1,
        'year' => 2016,
        'price' => 27499,
        'picture' => 'https://media.ed.edmunds-media.com/lexus/is-350/2016/oem/2016_lexus_is-350_sedan_base_rq_oem_1_500.jpg',
        'purchase_link' => 'http://www.lexus.com/build-your-lexus/#!/zip/02108/series/IS/trim',
        ]);

        // Toyota - Prius v
        $manufacturer_id = \App\Manufacturer::where('name','=','Toyota')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Prius',
        'style' => 'v',
        'manufacturer_id' => $manufacturer_id,
        'user_id' => 1,
        'year' => 2016,
        'price' => 22900,
        'picture' => 'https://media.ed.edmunds-media.com/toyota/prius-v/2016/oem/2016_toyota_prius-v_wagon_five_rq_oem_1_500.jpg',
        'purchase_link' => 'http://www.toyota.com/priusv/',
        ]);

        // Toyota - Mirai
        $manufacturer_id = \App\Manufacturer::where('name','=','Toyota')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Mirai',
        'style' => 'Base',
        'manufacturer_id' => $manufacturer_id,
        'user_id' => 1,
        'year' => 2016,
        'price' => 18900,
        'picture' => 'https://media.ed.edmunds-media.com/toyota/mirai/2016/ns/2016_toyota_mirai_prf_ns_111814_500.jpg',
        'purchase_link' => 'https://ssl.toyota.com/mirai/fcv.html',
        ]);

        // Honda - Fit
        $manufacturer_id = \App\Manufacturer::where('name','=','Honda')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Fit',
        'style' => 'Base',
        'manufacturer_id' => $manufacturer_id,
        'user_id' => 1,
        'year' => 2016,
        'price' => 15600,
        'picture' => 'https://media.ed.edmunds-media.com/honda/fit-ev/2013/oem/2013_honda_fit-ev_4dr-hatchback_base_fq_oem_4_500.jpg',
        'purchase_link' => 'http://automobiles.honda.com/fit/price.aspx',
        ]);
    }
}
