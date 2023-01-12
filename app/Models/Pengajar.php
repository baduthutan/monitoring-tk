<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;

      // nama tabel
      protected $table = 'pengajar';
      // inisiasi primary key
      protected $primary_key = 'NIP_Pengajar';
  
      // inisiasi foreign key
      protected $foreign_key = 'Username';

      // unable colom timestamp
      public $timestamps = false;
  
      // inisisasi yang bisa diisi
      protected $fillable = [
          'NIP_Pengajar',
          'Username',
          'Nama_Pengajar',
          'Jenis_Kelamin',
          'NO_Telepon'
      ];
}
