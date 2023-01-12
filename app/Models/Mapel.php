<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    // nama tabel
    protected $table = 'pelajaran';
    // inisiasi primary key
    protected $primary_key = 'ID_pelajaran';

    // unable colom timestamp
    public $timestamps = false;

    // inisisasi yang bisa diisi
    protected $fillable = [
        'ID_pelajaran',
        'Nama_pelajaran',
        'Deskripsi'
    ];
}