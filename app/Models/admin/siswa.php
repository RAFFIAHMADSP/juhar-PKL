<?php

namespace App\Models\admin;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Authenticatable
{
    use HasFactory;

    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';

    protected $fillable = ['id_pembimbing', 'nisn', 'password', 'nama_siswa', 'foto',];

    protected $hidden = ['password',];

    public function pembimbingSiswa(){
        return $this->belongsTo(pembimbing::class, 'id_pembimbing', 'id_pembimbing');
    }

    public function kegiatan(){
        return $this->hasMany(kegiatan::class, 'id_siswa', 'id_siswa');
    }
}
