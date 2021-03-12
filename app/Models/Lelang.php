<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;

    protected $table = 'tb_lelang';
    protected $primaryKey = 'id_lelang';
    protected $guarded = [];

    const CREATED_AT = 'tgl_lelang'; 
    const UPDATED_AT = 'updated_at';

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas', 'id_petugas');
    }

    public function barang()
    {
        return $this->hasOne(Barang::class, 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo(Masyarakat::class, 'id_user');
    }

    public function penawaran()
    {
        return $this->hasMany(Penawaran::class, 'id_lelang');
    }
}
