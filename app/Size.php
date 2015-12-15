<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Size extends Model
{
    /**
    * Cars come in many sizes
    * Define a one-to-many relationship.
    */
    public function car() {
        return $this->hasMany('\App\Car');
    }

    /**
    * Creating a drop down list of sizes
    * Ordering it by name
    */
    public function getSizesForDropdown() {
        $sizes = $this->orderby('name','ASC')->get();
        $sizes_for_dropdown = [];
        foreach($sizes as $size) {
            $sizes_for_dropdown[$size->id] = $size->name;
        }
        return $sizes_for_dropdown;
    }
}
