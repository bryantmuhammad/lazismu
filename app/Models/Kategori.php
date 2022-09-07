<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;

class Kategori extends Model
{
    use HasFactory;
    protected $primaryKey   = 'id_kategori';
    protected $guarded      = ['id_kategori'];


    //accessor for kategori name
    public function getNamaKategoriAttribute($value)
    {
        return ucfirst($value);
    }

    public function program()
    {
        return $this->hasMany(Program::class, 'id_kategori');
    }
}
