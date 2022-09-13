<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;
use Facade\FlareClient\View;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
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
        $pemasukans = Pemasukan::with('pembayaran', 'program', 'pengeluaran')->doesntHave('pengeluaran')->latest()->get();

        return view('admin.donasi.donasi', compact('pemasukans'));
    }

    public function pemasukan()
    {
        $pemasukans = Pemasukan::with('pembayaran', 'program', 'pengeluaran')
            ->has('pengeluaran')
            ->filter(request(['program', 'tanggalawal', 'tanggalakhir']))
            ->get()
            ->sortBy([
                ['program.nama_program', 'asc'],
                ['created_at', 'asc'],
            ]);
        $total = $pemasukans->sum('jumlah_pemasukan');
        $programs = Program::all();

        return view('admin.pemasukan.index', compact('pemasukans', 'total', 'programs'));
    }

    public function destroy(Pemasukan $pemasukan): void
    {
        if (!$pemasukan->status) {
            Pemasukan::destroy($pemasukan->id_pemasukan);
        }
    }
}
