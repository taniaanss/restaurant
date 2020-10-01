<?php

namespace App\Database\Seeds;

class TestSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
                $this->call('UserSeeder');
                $this->call('MenuSeeder');
                $this->call('CategorySeeder');
                $this->call('CustomerSeeder');
                $this->call('SupplierSeeder');
                $this->call('InputSeeder');
                $this->call('OutputSeeder');
        }
}
