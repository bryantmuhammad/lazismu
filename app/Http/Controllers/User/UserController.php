<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Pemasukan;
use App\Models\Program;


class UserController extends Controller
{
    public function index()
    {
        $programs   = Program::with('kategori')->take(9)->latest()->get();
        $kategoris  = Kategori::all();
        return view('user.index', compact('programs', 'kategoris'));
    }

    public function detail(Program $program)
    {
        $donaturs = Pemasukan::where('status', 1)->where('id_program', $program->id_program)->get();
        $total = $donaturs->sum('jumlah_pemasukan');
        return view('user.program.detail', compact('program', 'donaturs', 'total'));
    }

    public function program()
    {
        $kategoris = Kategori::all();
        $programs = Program::with('pemasukan')->paginate(10);

        return view('user.program.index', compact('kategoris', 'programs'));
    }

    public function programByKategori($idkategori)
    {
        $kategori   = Kategori::findOrFail($idkategori);
        $kategoris  = Kategori::all();
        $programs   = Program::with('pemasukan')->where('id_kategori', $idkategori)->paginate(10);

        return view('user.program.index', compact('kategoris', 'programs'));
    }

    public function tentangkami()
    {
        return view('user.tentangkami.index');
    }

    public function visimisi()
    {
        return view('user.visimisi.index');
    }
}
