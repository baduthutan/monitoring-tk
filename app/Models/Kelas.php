<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pengajar;

class Kelas extends Model
{
    public function guru()
        {
            return $this->belongsTo(Pengajar::class, 'NIP_Pengajar', 'NIP_Pengajar');
        }
    use HasFactory;

        // nama tabel
        protected $table = 'kelas';
        // inisiasi primary key
        protected $primary_key = 'ID_Kelas';
  
        // unable colom timestamp
        public $timestamps = false;
    
        // inisisasi yang bisa diisi
        protected $fillable = [
            'ID_Kelas',
            'NIP_Pengajar',
            'Tingkat_Kelas',
            'Nama_Kelas',
            'Tahun_Masuk'
        ];
}
