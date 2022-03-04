<?php

namespace App\Models;

use App\Models\User;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    use HasFactory;
    
    protected $table = 'cash_flows';
    protected $guarded = [];
    
    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F j, Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F j, Y');
    }
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
