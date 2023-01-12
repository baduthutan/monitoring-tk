<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{
    use HasFactory;

    // nama tabel
    protected $table = 'user';
    // inisiasi primary key
    protected $primary_key = 'username';

    // unable colom timestamp
    public $timestamps = false;

    // inisisasi yang bisa diisi
    protected $fillable = [
        'username',
        'password',
        'role'
    ];
}
