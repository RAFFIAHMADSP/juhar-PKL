<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

class admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';

    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'username',
        'password',
        'nama_admin',
        'foto',
    ];

    protected $hidden = [
        'password'
    ];
}
