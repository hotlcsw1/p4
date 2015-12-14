<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Manufacturer extends Model
{
    /**
    * Manufacturer has many Cars
    * Define a one-to-many relationship.
    */
    public function car() {
        return $this->hasMany('\App\Car');
    }

    /**
    * Creating a drop down list of manufacturers
    * Ordering it by name
    */
    public function getManufacturersForDropdown() {
        $manufacturers = $this->orderby('name','ASC')->get();
        $manufacturers_for_dropdown = [];
        foreach($manufacturers as $manufacturer) {
            $manufacturers_for_dropdown[$manufacturer->id] = $manufacturer->name;
        }
        return $manufacturers_for_dropdown;
    }
}
