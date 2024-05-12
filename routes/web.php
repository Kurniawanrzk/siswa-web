<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\siswaController;
Route::get('/', function () {
    return view('welcome');
});

Route::get("/siswa", [siswaController::class, 'data_siswa'])->name("data_siswa");
Route::post("/siswa/tambah", [siswaController::class, "tambah_data"])->name("tambah_siswa");
Route::put("/siswa/update", [siswaController::class, "update_data"])->name("update_data");
Route::delete("/siswa/hapus/{nis}", [siswaController::class, "delete_data"])->name("delete_data");
