<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dudi extends Model
{
    use HasFactory;

    protected $table = 'dudi';
    protected $primaryKey = 'id_dudi';

    protected $fillable = ['id_dudi', 'alamat_dudi', 'nama_dudi',];
}
