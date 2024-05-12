<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
class siswaController extends Controller
{
    public function data_siswa() {
        $data_siswa = siswa::all();
        return view("siswa")->with("data_siswa", $data_siswa);
    }

    // Untuk menambah data method post
    public function tambah_data(Request $request) {
        $siswa = new siswa;
        $res = $siswa->create([
            "nis" => $request->nis,
            "nama" => $request->nama,
            "umur" => $request->umur,
            "jk" => $request->jk
        ]);

        if($res) {
            return redirect()->back();
        }
    }

    public function update_data(Request $request) {
        $siswa = siswa::where("nis", $request->nis_asli);
        $res = $siswa->update([
            "nis" => (int)$request->nis,
            "nama" => $request->nama,
            "umur" =>(int)$request->umur,
            "jk" => $request->jk
        ]);

        if($res) {
            return redirect()->back();
        }


    }

    public function delete_data($nis) {
        $siswa = siswa::where("nis", $nis)->delete();
        if($siswa) {
            return redirect()->back();
        }

    }
}
