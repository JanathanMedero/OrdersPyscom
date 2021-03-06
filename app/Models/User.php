<?php

namespace App\Models;

use App\Models\OrderServiceOnSite;
use App\Models\Role;
use App\Models\SaleOrder;
use App\Models\ServiceOrder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'slug',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function SaleOrders()
    {
        return $this->hasMany(SaleOrder::class);
    }

    public function ServiceOrders()
    {
        return $this->hasMany(ServiceOrder::class);
    }

    public function OrderServideOnSites()
    {
        return $this->hasMany(OrderServiceOnSite::class);
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'id');
    }
}
