<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Petugas extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'tb_petugas';
    protected $primaryKey = 'id_level';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Change email column to username
     * 
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'id_level');
    }

    public function lelangs()
    {
        return $this->hasMany(Lelang::class, 'id_petugas');
    }
}
