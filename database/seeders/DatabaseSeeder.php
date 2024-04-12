<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'id' => 4,
                    'name' => 'Jamrud',
                    'email' => 'jamrud@gmail.com',
                    'password' => Hash::make('123'),
                    'is_admin' => true
                ],
                [
                    'id' => 5,
                    'name' => 'Udin',
                    'email' => 'udin@gmail.com',
                    'password' => Hash::make('123'),
                    'is_admin' => false
                ],
                [
                    'id' => 6,
                    'name' => 'Jonri',
                    'email' => 'jonri@gmail.com',
                    'password' => Hash::make('123'),
                    'is_admin' => true
                ]
            ]
        );

        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'Nasi Goreng',
                'price' => 12000,
                'description' => 'Loja Sangatta',
                'image' => 'gambar.png',
                'stock' => 50
            ],
            [
                'id' => 2,
                'name' => 'Nasi Kuning',
                'price' => 15000,
                'description' => 'Loja punya',
                'image' => 'gambar.png',
                'stock' => 50
            ],
            [
                'id' => 3,
                'name' => 'Kopi Americano',
                'price' => 13000,
                'description' => 'Loja Sangatta',
                'image' => 'gambar.png',
                'stock' => 50
            ],
            [
                'id' => 4,
                'name' => 'Signature Coffe Loja',
                'price' => 20000,
                'description' => 'Loja Sangatta',
                'image' => 'gambar.png',
                'stock' => 50
            ],
            [
                'id' => 5,
                'name' => 'Nasi Telur',
                'price' => 10000,
                'description' => 'Loja Sangatta',
                'image' => 'gambar.png',
                'stock' => 50
            ],
            [
                'id' => 6,
                'name' => 'Roti Bakar',
                'price' => 5000,
                'description' => 'Loja Sangatta',
                'image' => 'gambar.png',
                'stock' => 50
            ],
            [
                'id' => 7,
                'name' => 'Gorengan',
                'price' => 1000,
                'description' => 'Loja Sangatta',
                'image' => 'gambar.png',
                'stock' => 50
            ],
            [
                'id' => 8,
                'name' => 'Es Buah',
                'price' => 10000,
                'description' => 'Loja Sangatta',
                'image' => 'gambar.png',
                'stock' => 50
            ],
            [
                'id' => 9,
                'name' => 'Es Campur',
                'price' => 5000,
                'description' => 'Loja Sangatta',
                'image' => 'gambar.png',
                'stock' => 50
            ],
            [
                'id' => 10,
                'name' => 'Nasi Bakar Sambel Cakalang',
                'price' => 25000,
                'description' => 'Loja Sangatta',
                'image' => 'gambar.png',
                'stock' => 50
            ]
        ]);
    }
}
