<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'tb_level';
    protected $primaryKey = 'id_level';

    public function petugas()
    {
        return $this->hasMany(Petugas::class, 'id_level');
    }
}
