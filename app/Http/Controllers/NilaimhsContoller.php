<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nilai_mhs;
use Illuminate\Support\Facades\Validator;

class NilaimhsContoller extends Controller
{
    public function updateNilai(Request $request, $nim, $kelas, $semester, $kode)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        // $nim = $mahasiswa->nim;
        $nilai = Nilai::where(['nim' => $nim, 'semester' => $semester, 'kode_matkul' => $kode, 'kelas' => $kelas])->first();
        // return view('nilaimahasiswa')->with('semester1', $semester1);
        $nilai->h1 = $request->h1;
        $nilai->h2 = $request->h2;
        $nilai->h3 = $request->h3;
        $nilai->h4 = $request->h4;
        $nilai->h5 = $request->h5;
        $nilai->h6 = $request->h6;
        $nilai->h7 = $request->h7;
        $nilai->h8 = $request->h8;
        $nilai->hph = $request->hph;
        $nilai->hpts = $request->hpts;
        $nilai->hpas = $request->hpas;
        $nilai->hpa = $request->hpa;
        $nilai->predikat = $request->predikat;
        $nilai->save();
        return $nilai;
    }

    public function shownilai($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $semester1 = Nilai::where(['nim' => $nim, 'kelas' => $mahasiswa->kelas,
            'semester' => 1])->get();
        $semester2 = Nilai::where(['nim' => $nim, 'kelas' => $siswa->kelas,
            'semester' => 2])->get();
        // return view('nilaimahasiswa')->with('semester1', $semester1);
        return [
            'mahasiswa' => $mahasiswa,
            'semester1' => $semester1,
            'semester2' => $semester2,
        ];

    }

    public function addNullmatkul($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $kelas = $mahasiswa->kelas;
        $matkuls = matkul::where('kelas', $kelas)->get();
        for ($i = 1; $i <= 2; $i++) {
            for ($j = 0; $j < count($matkuls); $j++) {
                $nilai = new Nilai([
                    'kode_matkul' => $matkuls[$j]->kode_matkul,
                    'kelas' => $kelas,
                    'nim' => $mahasiswa->nim,
                    'semester' => $i,
                ]);
                $nilai->save();

            }
        }
        $semester1 = Nilai::where(['nim' => $nim,
            'semester' => 1, 'kelas' => $kelas])->get();
        $semester2 = Nilai::where(['nim' => $nim,
            'semester' => 2, 'kelas' => $kelas])->get();
        return [
            'mahasiswa' => $mahasiswa,
            'semester1' => $semester1,
            'semester2' => $semester2,
        ];

    }

    public function nilaiSemester($nim, $semester)
    {
        // $mahasiswa = Mahasiswa::where('id', $id)->first();
        // $nim = $mahasiswa->nim;
        $semester = Nilai::where([
            'nim' => $nim,
            'semester' => $semester,
        ])->get();
        return $semester;
    }
}
