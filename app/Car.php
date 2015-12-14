<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Car extends Model
{
    // Manufacturer can have many cars
    // So we are defining the inverse one-to-many relationship here.
    public function manufacturer() {
        return $this->belongsTo('\App\Manufacturer');
    }

    // Car has many tags
    public function tags() {
        return $this->belongsToMany('\App\Tag')->withTimestamps();
    }

    // Car can be tied to many users
    public function user() {
        return $this->belongsToMany('\App\User');
    }
}
