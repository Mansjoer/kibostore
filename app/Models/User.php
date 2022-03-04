<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Ticket;
use App\Models\CashFlow;
use App\Models\Balance;
use App\Models\Deposit;

use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\CausesActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CausesActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatar()
    {
        if(!$this->avatar){
            return asset('storage/images/avatar/default.jpg');
        }

        return asset('storage/images/avatar/'. $this->avatar);
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F j, Y');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F j, Y');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }

    public function ticket()
    {
        return $this->hasMany(Ticket::class);
    }

    public function deposit()
    {
        return $this->hasMany(Deposit::class)->orderByDesc('amount');
    }

    public function balances()
    {
        return $this->hasOne(Balance::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function cashflows()
    {
        return $this->hasMany(CashFlow::class);
    }
}
