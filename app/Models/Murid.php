<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kelas;

class Murid extends Model
{
    public function kelas()
        {
            return $this->belongsTo(Kelas::class, 'ID_Kelas', 'ID_Kelas');
        }
    use HasFactory;

    // nama tabel
    protected $table = 'murid';
    // inisiasi primary key
    protected $primary_key = 'NIS_Murid';

    // unable colom timestamp
    public $timestamps = false;

    // inisisasi yang bisa diisi
    protected $fillable = [
        'NIS_Murid',
        'username',
        'ID_Kelas',
        'Nama_Murid',
        'Nama_OrangTua',
        'Jenis_kelamin',
        'Tanggal_Lahir'
    ];
}
