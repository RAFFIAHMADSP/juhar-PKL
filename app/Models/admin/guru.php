<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';

    protected $fillable = ['nip', 'password', 'Email', 'nama_guru', 'foto'];

    protected $hidden = [
        'password'
    ];
}
