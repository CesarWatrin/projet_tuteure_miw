<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

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

    public function moderations() {
        return $this->hasMany(Moderation::class);
    }

    public function pictures() {
        return $this->belongsToMany(Picture::class);
    }

    public function views_all() {
        return $this->hasMany(View::class);
    }
}
