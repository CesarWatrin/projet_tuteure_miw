<?php

namespace App\Models;

use App\Notifications\StoreDisabled;
use App\Notifications\StoreEnabled;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Moderation extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'user_id',
        'store_id',
        'state',
        'comment'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function store() {
        return $this->belongsTo(Store::class);
    }

    public function sendStoreDisabledNotification() {
        $this->store->manager->notify(new StoreDisabled($this));
    }

    public function sendStoreEnabledNotification() {
        $this->store->manager->notify(new StoreEnabled($this));
    }
}
