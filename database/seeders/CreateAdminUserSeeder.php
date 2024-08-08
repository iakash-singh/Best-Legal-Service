<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Best Legal Services',
            'email' => 'info@bestlegalservices.com',
            'phone' => '1234567891',
            'password' => bcrypt('sail3boat4water5'),
            'is_admin' => '1',
        ]);
    }
}
