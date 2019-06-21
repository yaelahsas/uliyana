<?php

namespace App\Http\Controllers;
use App\Http\Requests\MahasiswaRequest;
use Illuminate\Http\Request;
use App\Kelas;
use App\JenisKelamin;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $kelamin = JenisKelamin::pluck('name','id')->all();
      $kelas = Kelas::pluck('name','id')->all();
      return view('mahasiswa.create', compact('kelas','kelamin'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MahasiswaRequest $request)
    {
      Mahasiswa::create($request->all());
      return redirect('mahasiswa');

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $mahasiswa = Mahasiswa::find($id);
      $kelas = Kelas::pluck('name','id')->all();
      $kelamin = JenisKelamin::pluck('name','id')->all();
      return view('mahasiswa.edit', compact('mahasiswa','kelamin','kelas'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MahasiswaRequest $request, $id)
    {
      $mahasiswa = Mahasiswa::find($id);
      $input = $request->all();
      $mahasiswa->update($input);
      return redirect('mahasiswa')->with('edit_mahasiswa','Data mahasiswa Berhasil di Edit');
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $mahasiswa = Mahasiswa::find($id);
$mahasiswa->delete($mahasiswa);
return redirect('mahasiswa')->with('deleted_mahasiswa','Data mahasiswa sudah di hapus');
        //
    }
}
