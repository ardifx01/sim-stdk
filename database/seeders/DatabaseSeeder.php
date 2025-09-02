<?php

namespace Database\Seeders;

use App\Models\Cash;
use App\Models\News;
use App\Models\User;
use App\Models\Galery;
use App\Models\Activities;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Inventories;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'nama' => 'Goval',
            'umur' => 21,
            'pekerjaan' => 'Programmer',
            'foto' => '',
            'alamat' => 'Br Paneca',
            'no_telepon' => '085123456789',
            'jabatan' => "ketua",
            'status' => "aktif",
            'jenis_kelamin' => "laki laki",
            'email' => 'imadegoval726@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // atau Hash::make('password')
        ]);
        User::create([
            'nama' => 'Aris',
            'umur' => 21,
            'pekerjaan' => 'Karyawan Swasta',
            'foto' => '',
            'alamat' => 'Br Paneca',
            'no_telepon' => '081330672365',
            'jabatan' => "wakil ketua",
            'status' => "aktif",
            'jenis_kelamin' => "laki laki",
            'email' => 'aris@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // atau Hash::make('password')
        ]);
        User::create([
            'nama' => 'Dek Mia',
            'umur' => 21,
            'pekerjaan' => 'Apoteker',
            'foto' => '',
            'alamat' => 'Br Paneca',
            'no_telepon' => '08133344567',
            'jabatan' => "sekretaris",
            'status' => "aktif",
            'jenis_kelamin' => "laki laki",
            'email' => 'dek_mia@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // atau Hash::make('password')
        ]);
        User::create([
            'nama' => 'Tuangga',
            'umur' => 23,
            'pekerjaan' => 'Accounting',
            'foto' => '',
            'alamat' => 'Br Paneca',
            'no_telepon' => '08512331254',
            'jabatan' => "bendahara",
            'status' => "aktif",
            'jenis_kelamin' => "laki laki",
            'email' => 'tuangga@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // atau Hash::make('password')
        ]);
        User::create([
            'nama' => 'Gabo',
            'umur' => 23,
            'pekerjaan' => 'Perawat',
            'foto' => '',
            'alamat' => 'Br Paneca',
            'no_telepon' => '085123312456',
            'jabatan' => "anggota",
            'status' => "aktif",
            'jenis_kelamin' => "laki laki",
            'email' => 'gabo@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'), // atau Hash::make('password')
        ]);
        User::factory(10)->create();
        Galery::factory(10)->create();
        Activities::factory(10)->create();
        Inventories::factory(10)->create();
        News::factory(10)->create();
        Cash::factory(10)->create();
    }
}
