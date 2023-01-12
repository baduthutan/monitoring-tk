<?php

use Illuminate\Support\Facades\Route;

// inisiasi controller
use App\Http\Controllers\Page;
use App\Http\Controllers\ortu;
use App\Http\Controllers\Auth;
use App\Http\Controllers\detailOrtu;
use App\Http\Controllers\detailBuku;
use App\Http\Controllers\listmurid;
use App\Http\Controllers\addmurid;
use App\Http\Controllers\listguru;
use App\Http\Controllers\addguru;
use App\Http\Controllers\listkelas;
use App\Http\Controllers\addkelas;
use App\Http\Controllers\addmapel;
use App\Http\Controllers\listmapel;
use App\Http\Controllers\gantipass;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('landing');
// });

Route::get('/dashboard', [Page::class, 'dashboard']);
Route::get('/penghubung/Tambah_Buku', [Page::class, 'indexAdd']);
Route::post('/penghubung/Tambah_Buku', [Page::class, 'indexAdd']);
Route::get('/login', [Auth::class, 'index']);
Route::post('/login', [Auth::class, 'login']);
Route::get('/logout', [Auth::class, 'logout']);

Route::resource('penghubung', Page::class);
Route::resource('penghubung-ortu', ortu::class);
Route::resource('penghubung-detailbuku', detailBuku::class);
Route::resource('penghubung-detailortu', detailOrtu::class);
Route::resource('datmaster-listmurid', listmurid::class);
Route::resource('datmaster-addmurid', addmurid::class);
Route::resource('datmaster-listguru', listguru::class);
Route::resource('datmaster-addguru', addguru::class);
Route::resource('datmaster-listkelas', listkelas::class);
Route::resource('datmaster-addkelas', addkelas::class);
Route::resource('datmaster-listmapel', listmapel::class);
Route::resource('datmaster-addmapel', addmapel::class);
Route::resource('gantipass', gantipass::class);