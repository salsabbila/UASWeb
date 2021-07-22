<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\matkul;
use App\Models\nilai;
use App\Models\mahasiswa;
use Illuminate\Support\Facades\Validator;

class MahasiswaContoller extends Controller
{
    public function index()
    {
    }

    public function all()
    {
        $mahasiswa = Mahasiswa::all();
        return $mahasiswa;
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required|unique:siswas',
            'jenis_kelamin' => 'required',
            'kelas' => 'required',
        ]);
        
        $matkul = Matkul::all();
        $mahasiswa = new Mahasiswa([

            'nama' => $request->get('nama'),
            'nim' => $request->get('nim'),
            'kelas' => $request->get('kelas'),
            'jenis_kelamin' => $request->get('jenis_kelamin'),
            'tanggal_lahir' => $request->get('tanggal_lahir'),
            'tempat_lahir' => $request->get('tempat_lahir'),
            'alamat' => $request->get('alamat'),
        ]);
        $mahasiswa->save();
        $nim = $mahasiswa->nim;
        for ($i = 1; $i <= 6; $i++) {
            for ($j = 0; $j < count($matkul); $j++) {
                $nilai = new Nilai([
                    'kode_matkul' => $matkul[$j]->kode_matkul,
                    'kelas' => $siswa->kelas,
                    'nim' => $mahasiswa->nim,
                    'semester' => $i,
                ]);
                $nilai->save();
            }
        }
        return "Success";
    }

    public function show($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        return $mahasiswa;
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $nis)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();
        return $mahasiswa;
    }

    public function destroy($nim)
    {
        Nilai::where('nim', $nim)->delete();
        Mahaiswa::where('nim', $nim)->delete();
        return 'Destroyed';
    }
}
