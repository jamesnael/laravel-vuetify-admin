<?php

namespace Modules\ManageUser\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ManageUser\Entities\Jabatan;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Jabatan::create([
            'nama_jabatan' => 'Administrator',
            'keterangan' => 'Admin Sistem',
            'hak_akses' => ["auth.login","dashboard.index","jabatan.index","jabatan.create","jabatan.destroy","jabatan.edit","user.index","user.create","user.destroy","user.edit","user.view",]
        ]);

        // $this->call("OthersTableSeeder");
    }
}
