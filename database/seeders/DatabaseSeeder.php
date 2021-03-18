<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Masyarakat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Level::create(['level' => 'administrator'])->petugas()->create([
            'nama_petugas' => 'Daffa Dziban Fadia',
            'username' => 'flatliners',
            'password' => '$2y$10$nZv1TD6HhXy.e.y3ThIMcONR2vcbRa61WM7xOVUDmrZiq.MERu1WO', // komputer123
            'api_token' => Str::random('60'),
        ]);

        Level::create(['level' => 'petugas'])->petugas()->create([
            'nama_petugas' => 'Daffa DF',
            'username' => 'daffadf',
            'password' => '$2y$10$nZv1TD6HhXy.e.y3ThIMcONR2vcbRa61WM7xOVUDmrZiq.MERu1WO', // komputer123
            'api_token' => Str::random('60'),
        ]);

        Masyarakat::create([
            'nama_lengkap' => 'Daffa Dziban Fadia',
            'username' => 'flatliners',
            'password' => '$2y$10$nZv1TD6HhXy.e.y3ThIMcONR2vcbRa61WM7xOVUDmrZiq.MERu1WO', // komputer123
            'api_token' => Str::random('60'),
            'telp' => '085222292552',
        ]);
    }
}
