<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->disableForeignKeys();
        Model::unguard();
        $this->truncateMultiple([
            'roles',
            'admins',
        ]);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $admin = Admin::first();
        $admin->assignRole('super_admin');
        Model::reguard();
    }
}
