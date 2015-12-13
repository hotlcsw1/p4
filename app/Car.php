<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Car extends Model
{
    public function manufacturer() {
        # Car belongs to Manufacturer
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\Manufacturer');
    }
    public function tags() {
        return $this->belongsToMany('\App\Tag')->withTimestamps();
    }

    public function user() {
        return $this->belongsToMany('\App\User');
    }
}
