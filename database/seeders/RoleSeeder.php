<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'Administrador']);
        $editor = Role::create(['name' => 'Editor']);


        Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $editor]);

        Permission::create(['name' => 'users.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'users.edit'])->syncRoles([$admin]);

        Permission::create(['name' => 'articulos.dashboard'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'articulos.create'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'articulos.edit'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'articulos.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'videos.dashboard'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'videos.create'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'videos.edit'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'videos.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'images.dashboard'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'images.create'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'images.edit'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'images.destroy'])->syncRoles([$admin]);

        Permission::create(['name' => 'podcast.dashboard'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'podcast.create'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'podcast.edit'])->syncRoles([$admin, $editor]);
        Permission::create(['name' => 'podcast.destroy'])->syncRoles([$admin]);
    }
}
