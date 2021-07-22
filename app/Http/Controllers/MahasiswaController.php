<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\mahasiswa;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function tambahView()
    {
        return view('tambahmahasiswa');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswadashboard')->with(['mahasiswas' => $mahasiswas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Mata Pelajaran
        $matkul = array('PAI', 'PKN', 'BIND', 'BING', 'MTK', 'IPA', 'IPS', 'SB',
            'PJOK', 'TAHSIN', 'TIK', 'BSUN', 'PLH', 'ARAB');
        $mahasiswa = new mahasiswa([
            'nama' => $request->get('nama'),
            'nim' => $request->get('nim'),
            'kelas' => $request->get('kelas'),
            'alamat' => $request->get('alamat'),
        ]);
        $mahasiswa->save();
        $nim = $mahasiswa->nim;
        for ($i = 1; $i <= 6; $i++) {
            for ($j = 0; $j < count($matkul); $j++) {
                $nilai = new Nilai([
                    'kode_matkul$matkul' => $matkul[$j],
                    'kelas' => $mahasiswa->kelas,
                    'nim' => $mahasiswa->nim,
                    'semester' => $i,
                ]);
                $nilai->save();
            }
        }
        return $mahasiswa;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function dump()
    {
        dd('Boo');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        return view('mahasiswaedit')->with('mahasiswa', $mahasiswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Mahasiswa::where('id', $id)->first()->update([
            'nama' => $request->get('nama'),
            'nim' => $request->get('nim'),
            'kelas' => $request->get('kelas'),
            'alamat' => $request->get('alamat'),
        ]);
        return redirect('/mahasiswa');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::where('id', $id)->delete();
        return redirect('/mahasiswa');
    }
}