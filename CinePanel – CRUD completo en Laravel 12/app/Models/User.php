<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Testing\Fluent\Concerns\Has;

class User extends Authenticatable
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = false;


    use HasFactory, Notifiable;

    protected $fillable = [
        'nombre',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            // Esto ya HASHÉA la contraseña automáticamente
            'password' => 'hashed',
        ];
    }

    public static function alta(array$data)
    {



        return self::create([
            'nombre'   => $data['nombre'],
            'email'    => $data['email'],
            'password' => $data['password'],
        ]);
    }
}
