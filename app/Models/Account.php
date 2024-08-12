<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
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
