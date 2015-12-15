<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Car extends Model
{
    # Manufacturer can have many cars
    public function manufacturer() {
        return $this->belongsTo('\App\Manufacturer');
    }

    # There are many car sizes
    public function size() {
        return $this->belongsTo('\App\Size');
    }

    # Car has many tags
    public function tags() {
        return $this->belongsToMany('\App\Tag')->withTimestamps();
    }

    # Car can be tied to many users
    public function user() {
        return $this->belongsToMany('\App\User');
    }
}
