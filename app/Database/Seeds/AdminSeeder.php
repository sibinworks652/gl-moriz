<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $builder = $this->db->table('admins');

        $existingAdmin = $builder->where('username', 'admin')->get()->getRowArray();

        if ($existingAdmin !== null) {
            return;
        }

        $builder->insert([
            'name'       => 'System Admin',
            'username'   => 'admin',
            'email'      => 'admin@morris.com',
            'password'   => password_hash('admin123', PASSWORD_DEFAULT),
            'role'       => 'admin',
            'status'     => 'active',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
