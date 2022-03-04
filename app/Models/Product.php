<?php

namespace App\Models;

use App\Models\Game;

use App\Models\Order;
use Spatie\Activitylog\LogOptions;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Sortable, LogsActivity;

    protected $guarded = [];

    protected $casts = [
        'preferences' => 'collection' // casting the JSON database column
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Products')
        ->logOnly(['product_sku', 'name', 'seller_price', 'price'])
        ->logOnlyDirty();
        // Chain fluent methods for configuration options
    }

    public function games()
    {
        return $this->belongsToMany(Game::class, 'game_product', 'product_id', 'game_id')->withTimestamps();
    }

    public function orders() 
    {
        return $this->belongsToMany(Order::class, 'order_product')->withTimestamps();
    }
}
