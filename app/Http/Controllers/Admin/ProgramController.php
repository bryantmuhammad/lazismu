<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProgramRequest;
use App\Models\Program;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->has('success')) {
            Alert::success('Berhasil', session('success'));
        }

        return view('admin.program.index', [
            'programs' => Program::all(),
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.program.create', [
            'kategoris' => Kategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramRequest $request)
    {
        Program::create([
            'nama_program'  => $request->nama_program,
            'id_kategori'   => $request->id_kategori,
            'keterangan'    => $request->keterangan,
            'foto'          => $request->file('foto')->store('program-images')
        ]);

        return redirect()->route('program.index')->with('success', 'Program berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        return $program;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramRequest $request, Program $program)
    {
        $validatedData = [
            'nama_program'  => $request->nama_program,
            'id_kategori'   => $request->id_kategori,
            'keterangan'    => $request->keterangan,
        ];

        if ($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('program-images');
            Storage::delete($program->foto);
        }

        Program::where('id_program', $program->id_program)->update($validatedData);

        return redirect()->route('program.index')->with('success', 'Program berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        Storage::delete($program->foto);
        Program::destroy($program->id_program);

        return redirect()->route('program.index')->with('success', 'Program berhasil dihapus');
    }
}
