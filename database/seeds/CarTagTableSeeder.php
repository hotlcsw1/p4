<?php
use Illuminate\Database\Seeder;
class CarTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars =[
            'F-Pace' => ['Luxury','Premium','Sedan'],
            'Prius' => ['Hybrid','Sedan','Economy'],
            'Accord Hybrid' => ['Hybrid','Sedan', 'Full Size'],
            'Mirai' => ['Fuel Cell','Compact','Sedan'],
            'IS' => ['Economy','Sedan']
        ];

        // For each car, insert into it its tags from above
        foreach($cars as $model => $tags) {
            $car = \App\Car::where('model','like',$model)->first();
            foreach($tags as $tagName) {
                $tag = \App\Tag::where('name','LIKE',$tagName)->first();
                $car->tags()->save($tag);
            }

        }
    }
}
