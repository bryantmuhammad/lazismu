<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $primaryKey   = 'id_pembayaran';
    protected $fillable     = ['id_pembayaran', 'id_pemasukan', 'jenis_pembayaran', 'va_number', 'jenis_bank', 'pdf', 'status'];
    public $incrementing    = false;
}
