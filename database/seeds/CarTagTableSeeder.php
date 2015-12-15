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
            'GS450h' => ['Sedan','Luxury','Hybrid'],
            'Grand Cherokee' => ['SUV','Premium'],
            'Accord Hybrid' => ['Sedan','Full Size','Hybrid'],
            'IS 350' => ['Sedan','Economy'],
            'Prius v' => ['Sedan','Economy', 'Hybrid'],
            'Mirai' => ['Sedan','Compact','Fuel Cell'],
            'Fit' => ['Sedan','Compact'],
            'B-Class' => ['Sedan','Compact','Hybrid'],
            'Tucson EV' => ['SUV','Compact','Fuel Cell']
            
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
