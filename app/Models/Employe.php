<?php

namespace App\Models;

use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{

    protected $table = 'users';

    protected $fillable = [
        'role_id',
        'name',
        'slug',
        'email',
        'password',
    ];

    use HasFactory;

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
