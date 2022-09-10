<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pemasukan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $pemasukans = Pemasukan::with('pembayaran', 'program', 'pengeluaran')->has('pengeluaran')->get()->sortBy([
            ['program.nama_program', 'asc'],
            ['created_at', 'asc'],
        ]);

        return view('admin.pemasukan.index', compact('pemasukans'));
    }
}
