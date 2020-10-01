<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run()
    {
        $data1 = [
            'first_name' => 'admin',
            'last_name' => 'aja',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$jYDgocm90pdncbfZsUQgNOu9GtoPbFc4PMkZ1kqVKvl5kKnP0FxWC',
        ];

    
        $this->db->table('users')->insert($data1);
    
    }
}
