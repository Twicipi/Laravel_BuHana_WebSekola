<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class,'create'])->name('siswa.create');
Route::post('/siswa', [SiswaController::class,'store'])->name('siswa.store');
Route::get('/siswa/edit/{id}', [SiswaController::class,'edit'])->name('siswa.edit');
Route::patch('/siswa/{id}', [SiswaController::class, 'update']);
route::delete('/siswa/{id}', [SiswaController::class, 'destroy']);


Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index');
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create');
Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit');
Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('kelas.update');
Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');


Route::get('/nyobain',[SiswaController::class, 'kelas'])->name('siswa.kelas');
Route::get('/learning',[SiswaController::class, 'learning'])->name('siswa.learning');
