<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    use HasFactory;

    protected $table = 'history_lelang';
    protected $primaryKey = 'id_history';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'date:F j, Y. g:i a'
    ];

    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'id_lelang');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function user()
    {
        return $this->belongsTo(Masyarakat::class, 'id_user');
    }
}
