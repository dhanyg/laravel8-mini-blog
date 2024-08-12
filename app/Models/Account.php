<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class Account extends User
{
    use HasFactory, Notifiable;
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    protected $table = 'account';
    protected $fillable = [
        'username',
        'password',
        'name',
        'role'
    ];

    protected $hidden = ['password'];
}
