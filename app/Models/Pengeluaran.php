<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;
    protected $primaryKey   = 'id_pengeluaran';
    protected $guarded      = ['id_pengeluaran'];
}
