<?php

namespace Modules\ManageUser\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ManageUser\Entities\User;
use Modules\ManageUser\Database\Seeders\JabatanTableSeeder;

class ManageUserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call([
            JabatanTableSeeder::class
        ]);

        User::create([
            'group_users_id' => 1,
            'nama_lengkap' => 'Admin Panel',
            'no_hp' => '+6287855113366',
            'email' => 'admin@admin.com',
            'alamat_lengkap' => 'Jl. Kenangan Indah No. 12 Blok D',
            'username' => 'admin_test',
            'password' => 'password',
            'status' => 'Aktif'
        ]);

        // $this->call("OthersTableSeeder");
    }
}
