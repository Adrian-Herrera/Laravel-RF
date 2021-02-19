<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('Documents');
        Storage::deleteDirectory('Infografias');
        Storage::deleteDirectory('Podcasts');
        Storage::deleteDirectory('Portada');
        Storage::deleteDirectory('profile-photos');
        Storage::deleteDirectory('Videos');

        Storage::deleteDirectory('public/Documents');
        Storage::deleteDirectory('public/Infografias');
        Storage::deleteDirectory('public/Podcasts');
        Storage::deleteDirectory('public/Portada');
        Storage::deleteDirectory('public/profile-photos');
        Storage::deleteDirectory('public/Videos');

        Storage::makeDirectory('profile-photos');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
