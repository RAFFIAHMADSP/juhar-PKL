<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'Kegiatan';
    protected $primaryKey = 'id_kegiatan';

    protected $fillable = [
        'id_siswa',
        'tanggal_kegiatan',
        'nama_kegiatan',
        'ringkasan_kegiatan',
        'foto',
    ];

    public function kegiatanSiswa(){
        return $this->belongsTo(siswa::class, 'id_siswa', 'id_siswa');
    }
}
