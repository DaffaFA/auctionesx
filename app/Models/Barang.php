<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    protected $guarded = [];
    
    const CREATED_AT = 'tgl'; 
    const UPDATED_AT = 'updated_at';

    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'id_barang');
    }

    public function penawaran()
    {
        return $this->hasMany(Penawaran::class, 'id_barang');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'id_barang');
    }
}
