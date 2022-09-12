<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengeluaranRequest;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use App\Models\Program;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasukans = Pemasukan::with('pengeluaran', 'program', 'pembayaran')
            ->has('pengeluaran')
            ->filter(request(['program', 'tanggalawal', 'tanggalakhir']))
            ->get()
            ->sortBy(
                ['program.nama_program', 'asc'],
                ['created_at', 'asc']
            );

        $total      = $pemasukans->sum('jumlah_pemasukan');
        $programs   = Program::all();

        return view('admin.pengeluaran.index', compact('pemasukans', 'total', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PengeluaranRequest $request)
    {
        Pengeluaran::create($request->all());
        return redirect()->route('admin.donasi')->with('success', 'Pengeluaran berhasil ditambahkan');
    }
}
