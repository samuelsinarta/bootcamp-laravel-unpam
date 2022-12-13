<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kategoriproduk;
use App\Models\Produkmodel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Kategoriproduk::create(
            [
                "kodekategori" => "1001",
                "namakategori" => "ATK"
            ]
        );

        Kategoriproduk::create(
            [
                "kodekategori" => "1002",
                "namakategori" => "Kitchen"
            ]
        );

        Kategoriproduk::create(
            [
                "kodekategori" => "1003",
                "namakategori" => "Otomotif"
            ]
        );

        Produkmodel::factory(50)->create();

    }
}
