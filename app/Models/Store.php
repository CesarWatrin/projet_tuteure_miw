<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function subcategory() {
        return $this->belongsTo(Subcategory::class);
    }

    public function manager() {
        return $this->belongsTo(User::class);
    }

    public function favorited_by() {
        return $this->belongstoMany(User::class, 'favorites');
    }

    public function ratings() {
        return $this->hasMany(Rating::class);
    }
}
