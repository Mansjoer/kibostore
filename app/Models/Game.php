<?php

namespace App\Models;

use App\Models\Order;

use App\Models\Product;
use Spatie\Activitylog\LogOptions;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory, Sortable, LogsActivity, CausesActivity;

    protected $guarded = [];

    protected $casts = [
        'preferences' => 'collection' // casting the JSON database column
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->useLogName('Games')
        ->logOnly(['name', 'display_name', 'status']);
        // Chain fluent methods for configuration options
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'game_product', 'game_id', 'product_id')->withTimestamps();
    }  


    public function orders() 
    { 
        return $this->hasManyThrough(Order::class, Product::class);
    }
}
