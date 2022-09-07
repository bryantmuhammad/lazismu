<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Program;


class UserController extends Controller
{
    public function index()
    {
        $programs   = Program::with('kategori')->get();
        $kategoris  = Kategori::all();
        return view('user.index', compact('programs', 'kategoris'));
    }

    public function detail(Program $program)
    {
        return view('user.program.detail', compact('program'));
    }
}
