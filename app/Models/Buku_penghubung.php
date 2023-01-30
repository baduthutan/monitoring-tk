<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Murid;

class Buku_penghubung extends Model
{
    public function mapel()
        {
            return $this->belongsTo(Mapel::class, 'ID_Pelajaran', 'ID_Pelajaran');
        }
        public function kelas()
        {
            return $this->belongsTo(Kelas::class, 'ID_Kelas', 'ID_Kelas');
        }
        public function murid()
        {
            return $this->belongsTo(Murid::class, 'NIS_Murid', 'NIS_Murid');
        }
    use HasFactory;

        // nama tabel
        protected $table = 'buku_penghubung';
        // inisiasi primary key
        protected $primary_key = 'ID_Buku';
        
        // unable colom timestamp
        public $timestamps = false;
    
        // inisisasi yang bisa diisi
        protected $fillable = [
            'ID_Buku',
            'ID_Kelas',
            'NIS_Murid',
            'ID_Pelajaran',
            'tanggal',
            'Evaluasi_OrangTua',
            'Catatan_Guru',
            'Main_Course',
            'Snack',
            'Status_Mcourse',
            'Status_Snack',
            'Absen'
        ];
}