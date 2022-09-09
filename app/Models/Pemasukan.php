<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;
use App\Models\Pembayaran;

class Pemasukan extends Model
{
    use HasFactory;
    protected $primaryKey   = 'id_pemasukan';
    protected $fillable      = ['id_pemasukan', 'id_program', 'nama_donatur', 'catatan', 'jumlah_pemasukan', 'email', 'status'];
    public $incrementing    = false;


    public function program()
    {
        return $this->belongsTo(Program::class, 'id_program');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pemasukan');
    }
}
