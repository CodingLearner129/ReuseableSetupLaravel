<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\DisableForeignKeys;
use Database\Seeders\Traits\TruncateTable;
use Ramsey\Uuid\Uuid;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    use DisableForeignKeys, TruncateTable;

    public function run()
    {
        // $this->disableForeignKeys();
        // Admin::truncate();

        $admin = [
            'name' => "admin",
            'email' => 'reuseable_admin@yopmail.com',
            'password' => bcrypt('Pa$$w0rd!'),
            'created_at' => time(),
            'updated_at' => time()
        ];
        Admin::insert($admin);
    }
}
