<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Masyarakat;
use Illuminate\Database\Seeder;

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
            'password' => '$2y$10$nZv1TD6HhXy.e.y3ThIMcONR2vcbRa61WM7xOVUDmrZiq.MERu1WO' // komputer123
        ]);

        Level::create(['level' => 'petugas'])->petugas()->create([
            'nama_petugas' => 'Daffa DF',
            'username' => 'daffadf',
            'password' => '$2y$10$nZv1TD6HhXy.e.y3ThIMcONR2vcbRa61WM7xOVUDmrZiq.MERu1WO' // komputer123
        ]);

        Masyarakat::create([
            'nama_lengkap' => 'Daffa Dziban Fadia',
            'username' => 'flatliners',
            'password' => '$2y$10$nZv1TD6HhXy.e.y3ThIMcONR2vcbRa61WM7xOVUDmrZiq.MERu1WO', // komputer123
            'telp' => '085222292552',
        ]);
    }
}
