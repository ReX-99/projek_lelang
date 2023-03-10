<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = [
            [
                'name' => 'admin',
                'username' => 'dafa',
                'password' => bcrypt('dafa'),
                'repassword' => ('dafa'),
                'level' => 'admin',
                'telepon' => '085890012923'

            ],
            [
                'name' => 'petugas',
                'username' => 'petugas',
                'password' => bcrypt('petugas'),
                'repassword' => ('petugas'),
                'level' => 'petugas',
                'telepon' => '081234567890'
            ],
            [
                'name' => 'masyarakat',
                'username' => 'masyarakat',
                'password' => bcrypt('masyarakat'),
                'repassword' => ('masyarakat'),
                'level' => 'masyarakat',
                'telepon' => '081234567891'
            ]
        ];

        foreach ($users as $key => $value) {
            User::create($value);
        }
    }
}
