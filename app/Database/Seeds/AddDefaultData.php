<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AddDefaultData extends Seeder
{
    public function run(): void
    {
        $this->db->table('accounts')->insert([
            'username'      => 'admin',
            'password'      => password_hash('admin', PASSWORD_BCRYPT),
            'flag'          => 0,
            'status'        => 1,
            'fail_time'     => 0,
            'last_login_at' => null,
            'created_at'    => date('Y-m-d H:i:s', time()),
            'updated_at'    => date('Y-m-d H:i:s', time()),
        ]);
    }
}
