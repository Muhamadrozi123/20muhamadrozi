<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajaran extends Model
{
    use HasFactory;

    
    protected $table = 'pengajarans';
    protected $fillable = ['id_pengajar','id_guru','id_mapel','kelas','jam_pelajaran'];

    public function guru(){
        return $this->belongsTo(Guru::class,'id_guru');
    }
    public function mapel(){
        return $this->belongsTo(Mapel::class,'id_mapel');
    }
}
