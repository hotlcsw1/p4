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
        # Lexus - GS450h
        $manufacturer_id = \App\Manufacturer::where('name','=','Lexus')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'GS450h',
        'style' => 'Premium',
        'manufacturer_id' => $manufacturer_id,
        'size_id' => 5,
        'user_id' => 1,
        'year' => 2016,
        'price' => 68125,
        'picture' => 'https://media.ed.edmunds-media.com/lexus/gs-450h/2016/oem/2016_lexus_gs-450h_sedan_base_fq_oem_2_500.jpg',
        'purchase_link' => 'http://www.lexus.com/build-your-lexus/#!/series/GS/',
        ]);

        # Jeep - Grand Cherokee
        $manufacturer_id = \App\Manufacturer::where('name','=','Jeep')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Grand Cherokee',
        'style' => 'Altitude',
        'manufacturer_id' => $manufacturer_id,
        'size_id' => 5,
        'user_id' => 2,
        'year' => 2016,
        'price' => 34499,
        'picture' => 'https://media.ed.edmunds-media.com/jeep/grand-cherokee/2016/fe/2016_jeep_grand-cherokee_f34_fe_1106151_500.jpg',
        'purchase_link' => 'http://www.jeep.com/model-compare/detailed-chart/?modelYearCode=CUJ201503&variation=1',
        ]);

        # Honda - Accord Hybrid
        $manufacturer_id = \App\Manufacturer::where('name','=','Honda')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Accord Hybrid',
        'style' => 'Touring',
        'manufacturer_id' => $manufacturer_id,
        'size_id' => 5,
        'user_id' => 1,
        'year' => 2016,
        'price' => 29600,
        'picture' => 'https://media.ed.edmunds-media.com/honda/accord-hybrid/2015/oem/2015_honda_accord-hybrid_sedan_touring_rq_oem_1_500.jpg',
        'purchase_link' => 'http://automobiles.honda.com/accord-hybrid/price.aspx',
        ]);

        # Lexus - IS
        $manufacturer_id = \App\Manufacturer::where('name','=','Lexus')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'IS 350',
        'style' => 'F Sport',
        'manufacturer_id' => $manufacturer_id,
        'size_id' => 1,
        'user_id' => 2,
        'year' => 2016,
        'price' => 27499,
        'picture' => 'https://media.ed.edmunds-media.com/lexus/is-350/2016/oem/2016_lexus_is-350_sedan_base_rq_oem_1_500.jpg',
        'purchase_link' => 'http://www.lexus.com/build-your-lexus/#!/zip/02108/series/IS/trim',
        ]);

        # Toyota - Prius v
        $manufacturer_id = \App\Manufacturer::where('name','=','Toyota')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Prius v',
        'style' => 'Base',
        'manufacturer_id' => $manufacturer_id,
        'size_id' => 2,
        'user_id' => 2,
        'year' => 2016,
        'price' => 22900,
        'picture' => 'https://media.ed.edmunds-media.com/toyota/prius-v/2016/oem/2016_toyota_prius-v_wagon_five_rq_oem_1_500.jpg',
        'purchase_link' => 'http://www.toyota.com/priusv/',
        ]);

        # Toyota - Mirai
        $manufacturer_id = \App\Manufacturer::where('name','=','Toyota')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Mirai',
        'style' => 'Base',
        'manufacturer_id' => $manufacturer_id,
        'size_id' => 1,
        'user_id' => 1,
        'year' => 2016,
        'price' => 18900,
        'picture' => 'https://media.ed.edmunds-media.com/toyota/mirai/2016/ns/2016_toyota_mirai_prf_ns_111814_500.jpg',
        'purchase_link' => 'https://ssl.toyota.com/mirai/fcv.html',
        ]);

        # Honda - Fit
        $manufacturer_id = \App\Manufacturer::where('name','=','Honda')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Fit',
        'style' => 'Base',
        'manufacturer_id' => $manufacturer_id,
        'size_id' => 1,
        'user_id' => 4,
        'year' => 2016,
        'price' => 15600,
        'picture' => 'https://media.ed.edmunds-media.com/honda/fit/2016/oem/2016_honda_fit_4dr-hatchback_ex-l-wnavigation_s_oem_1_500.jpg',
        'purchase_link' => 'http://automobiles.honda.com/fit/price.aspx',
        ]);

        # Hyundai - Tucson EV
        $manufacturer_id = \App\Manufacturer::where('name','=','Hyundai')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'Tucson EV',
        'style' => 'Base',
        'manufacturer_id' => $manufacturer_id,
        'size_id' => 5,
        'user_id' => 3,
        'year' => 2016,
        'price' => 40999,
        'picture' => 'https://media.ed.edmunds-media.com/hyundai/tucson/2016/oem/2016_hyundai_tucson_4dr-suv_limited_s_oem_1_500.jpg',
        'purchase_link' => 'https://www.hyundaiusa.com/tucsonfuelcell/index.aspx',
        ]);

        # Mercedes Benz - B-Class
        $manufacturer_id = \App\Manufacturer::where('name','=','Mercedes Benz')->pluck('id');
        DB::table('cars')->insert([
        'created_at' => Carbon\Carbon::now()->toDateTimeString(),
        'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        'model' => 'B-Class',
        'style' => 'Base',
        'manufacturer_id' => $manufacturer_id,
        'size_id' => 1,
        'user_id' => 3,
        'year' => 2016,
        'price' => 41450,
        'picture' => 'https://media.ed.edmunds-media.com/mercedes-benz/b-class-electric-drive/2016/oem/2016_mercedes-benz_b-class-electric-drive_4dr-hatchback_b250e_s_oem_2_500.jpg',
        'purchase_link' => 'https://www.mbusa.com/mercedes/vehicles/build/class-B/model-B250E#tab=tab-exterior',
        ]);
    }
}
