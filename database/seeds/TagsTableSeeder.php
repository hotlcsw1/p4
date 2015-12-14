<?php
use Illuminate\Database\Seeder;
class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Hybrid','Fuel Cell','Economy','Compact','Intermediate','Full Size','Sedan','Mini Van','SUV','Wagon','Truck','Premium','Luxury','Convertible','Specialty Car'];
        foreach($data as $tagName) {
            $tag = new \App\Tag();
            $tag->name = $tagName;
            $tag->save();
        }
    }
}
