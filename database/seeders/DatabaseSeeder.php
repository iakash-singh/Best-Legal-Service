<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call([
            BlogCategorySeeder::class,
            BlogTagSeeder::class,
            PermissionTableSeeder::class,
            UpdatePermissionTableSeeder::class,
            RoleTableSeeder::class,
            PermissionRoleSeeder::class,
            CreateAdminUserSeeder::class,
            RoleUserTableSeeder::class
        ]);
    }
}
