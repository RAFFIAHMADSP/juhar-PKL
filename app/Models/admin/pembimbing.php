<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembimbing extends Model
{
    use HasFactory;

    protected $table = 'pembimbing';
    protected $primaryKey = 'id_pembimbing';

    protected $fillable = ['id_guru', 'id_dudi'];

    public function guru(){
        return $this ->hasOne(guru::class, 'id_guru', 'id_guru');
    }
    public function dudi(){
        return $this ->hasOne(dudi::class, 'id_dudi', 'id_dudi');
    }

    public function siswa(){
        return $this->hasMany(siswa::class, 'id_pembimbing', 'id_pembimbing');
    }
}
