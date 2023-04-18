<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Murid;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $murid = Murid::orderBy('id','asc')->paginate(5);
        return view('murid.index',compact('murid'))
                ->with('i',(request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('murid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request["kode"]     = Uuid::uuid4()->toString();
        $request->validate([
            'full_name'=>'required|min:3',
            'notelp' => 'required|numeric',
            'kota'=>'required',
            //'gambarMahasiswa' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        Murid::create($request->all());
        return redirect()->route('murid.index')
                         ->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $murid = Murid::find($id);
        return view('murid.detail', compact('murid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $murid = Murid::find($id);
        return view('murid.edit', compact('murid'));
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
        $request->validate([
            'full_name'=>'required|min:3',
            'notelp' => 'required|numeric',
            'kota'=>'required',
        ]);
        $murid = Murid::find($id);
        $murid->full_name = $request->get('full_name');
        $murid->notelp = $request->get('notelp');
        $murid->kota = $request->get('kota');
        $murid->save();
        return redirect()->route('murid.index')
                         ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Murid::find($id);
        $mahasiswa->delete();
        return redirect()->route('murid.index')
                         ->with('success', 'Data Murid kelas A berhasil dihapus');
    }
}
