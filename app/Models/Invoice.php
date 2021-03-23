<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'due_date' => 'date:F j, Y. g:i a'
    ];

    public function lelang()
    {
        return $this->belongsTo(Lelang::class, 'id_lelang');
    }
}
