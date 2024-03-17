<?php

namespace App\Models;

use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'password',
        'username',
        'vip_id',
        'phone',
        'gender',
        'withdrawal_pin',
        'referral_code',
        'available_balance',
        'total_balance',
        'wallet_account_name',
        'wallet_address',
        'wallet_name',
        'wallet_network'
    ];

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

    public function vip(){
        return $this->belongsTo(Vip::class);
    }

    public function setCompletion($user_id){
        $today_set = SetCompletion::where('user_id', $user_id)->whereDate('created_at', Carbon::today())->first();
        return $today_set;
    }
}
