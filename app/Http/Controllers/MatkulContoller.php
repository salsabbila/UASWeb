<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\matkul;
use Illuminate\Support\Facades\Validator;

class MatkulContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkull = matkul::all();
        return $matkul;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_matkul' => 'required|string|max:10|unique:matkuls',
            'matkul' => 'required',
        ]);
        $matkul = Matkul::create([
            'kode_matkul' => $request->kode_matkul,
            'matkul' => $request->matkul,
            'kelas' => $request->kelas,
        ]);
        $matkul->save();
        return $matkul;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matkul = Matkul::where('id', $id)->first();
        return $matkul;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $this->validate($request, [
            'matkul' => 'required',
        ]);
        $matkul = Matkul::where('id', $id)->first();
        $matkul->matkul = $request->matkul;
        $matkul->kelas = $request->kelas;
        $matkul->save();
        return $matkul;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matkul::where('id', $id)->delete();
        return 'Destroyed';
    }
}
