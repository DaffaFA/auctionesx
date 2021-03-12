<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Masyarakat extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that define which table is used.
     *
     * @var string
     */
    protected $table = 'tb_masyarakat';

    /**
     * The attributes that define which table is used.
     *
     * @var string
     */
    protected $primaryKey = 'id_user';

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
        'password', 'remember_token', 'api_token'
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

    public function lelangs()
    {
        return $this->hasMany(Lelang::class, 'id_user');
    }

    public function penawaran()
    {
        return $this->hasMany(Penawaran::class, 'id_user');
    }
}
