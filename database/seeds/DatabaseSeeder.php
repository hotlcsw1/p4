<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        # Seed Users table
        $this->call(UsersTableSeeder::class);
        # Seed Sizes table
        $this->call(SizesTableSeeder::class);
        # Seed Manufacturer table->needs to be done before the cars table
        $this->call(ManufacturersTableSeeder::class);
        # Seed Tags table
        $this->call(TagsTableSeeder::class);
        # Seed Cars table->Needs to be after Manufacturers table - Due to FK to manufacturer_id
        $this->call(CarsTableSeeder::class);
        # Seed Cars table->Needs to be after Cars table - Due to FK to tag
        $this->call(CarTagTableSeeder::class);

        Model::reguard();
    }
}
