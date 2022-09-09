<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $primaryKey   = 'id_pemasukan';
    protected $fillable      = ['id_pemasukan', 'id_program', 'nama_donatur', 'catatan', 'jumlah_pemasukan', 'email', 'status'];
    public $incrementing    = false;
}
