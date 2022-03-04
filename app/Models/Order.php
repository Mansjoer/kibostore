<?php

namespace App\Models;

use App\Models\Game;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products() { 
        return $this->belongsToMany(Product::class, 'order_product')->withTimestamps();
    }

    public function games() { 
        return $this->belongsToMany(Game::class, 'order_product')->withTimestamps();
    }
    
    public function user() { 
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F j, Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F j, Y');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
