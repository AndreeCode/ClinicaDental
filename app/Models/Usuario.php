<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $fillable = [
        'name',
        'user',
        'password',
        'role',
        'telefono',
    ];
    protected $hidden = [
        'password',
    ];
    public function getAuthIdentifierName()
    {
        return 'usuario';  // Este es el campo que se usará para la autenticación
    }
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
