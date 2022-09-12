<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;

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

    public function pengeluaran()
    {
        return $this->hasOne(Pengeluaran::class, 'id_pemasukan');
    }

    public function scopeFilter($query, array $filters)
    {
        //NULL coalescing operator
        $query->when($filters['tanggalawal'] ?? false, function ($query, $search) {

            return $query->where(function ($query) use ($search) {
                $query->where('created_at', '>=', $search . " 00:00:00");
            });
        });

        $query->when($filters['tanggalakhir'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('created_at', '<=', $search . " 23:59:59");
            });
        });

        $query->when($filters['program'] ?? false, function ($query, $program) {
            return $query->whereHas('program', function ($query) use ($program) {
                $query->where('id_program', $program);
            });
        });
    }
}
