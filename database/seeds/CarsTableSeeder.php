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
        'miles' => 1000,
        'price' => 38999,
        'picture' => 'http://www.jaguarusa.com/Images/FP_17MY_162_GEE_GALLERY-device_desktop-1366x769_tcm97-186306_gallerythumbnail_195x110.jpg?v=3',
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
        'miles' => 5000,
        'price' => 34499,
        'picture' => 'http://www.jeep.com/iof/?IMG=EAL_IMAGES/2015\images\CC\CC15_WKJH74_2TA_PXR_APA_XXX_XXX_XXX.png&AUTOTRIM=1&AUTOTRIM=1&HEIGHT=70&WIDTH=150',
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
        'miles' => 20390,
        'price' => 29600,
        'picture' => 'http://automobiles.honda.com/images/2015/accord-hybrid/exterior-gallery/2015-honda-accord-hybrid-sedan-1.jpg',
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
        'user_id' => 2,
        'year' => 2016,
        'miles' => 70000,
        'price' => 27499,
        'picture' => 'http://www.lexus.com/cm-img/gallery/2016/Lexus-IS-exterior-silver-lining-metallic-action-gallery-overlay-1204x677-LEX-ISG-MY15-0122.jpg',
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
        'miles' => 67000,
        'price' => 22900,
        'picture' => 'http://www.toyota.com/content/vehicle-landing/2016/priusv/colorizer/3P0.jpg?interpolation=lanczos-none&output-quality=90&downsize=810px:*',
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
        'user_id' => 2,
        'year' => 2016,
        'miles' => 275,
        'price' => 18900,
        'picture' => 'https://ssl.toyota.com/mirai/assets/core/images/nav/desktop/ownership-experience.jpg',
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
        'miles' => 79000,
        'price' => 15600,
        'picture' => 'http://automobiles.honda.com/handlers/resize-image.ashx?w=1076&h=605&q=70&fn=/images/2016/fit/exterior-gallery-new/2016-silver-honda-fit-side3.jpg',
        'purchase_link' => 'http://automobiles.honda.com/fit/price.aspx',
        ]);
    }
}
