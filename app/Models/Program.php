<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\Pemasukan;

class Program extends Model
{
    use HasFactory;
    protected $primaryKey   = 'id_program';
    protected $guarded      = ['id_program'];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function pemasukan()
    {
        return $this->hasMany(Pemasukan::class, 'id_program');
    }
}
