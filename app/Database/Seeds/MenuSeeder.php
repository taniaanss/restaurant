<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class MenuSeeder extends Seeder
{
    
    
    public function run()
    {
        
        $data1 = [
            'menu_name' => 'Pizza',
            'menu_stock' => 10,
            'menu_price' =>  120000,
            'menu_category' => 1,
            'description' => 'Pizza Premium',
        ];

        $data2 = [
            'menu_name' => 'Apel',
            'menu_stock' => 30,
            'menu_price' =>  5000,
            'menu_category' => 2,
            'description' => 'Apel Segar',
        ];

        $data3 = [
            'menu_name' => 'Kue Tar',
            'menu_stock' => 8,
            'menu_price' =>  29000,
            'menu_category' => 1,
            'description' => 'Makanan Enak',
        ];

        $this->db->table('menu')->insert($data1);
        $this->db->table('menu')->insert($data2);
        $this->db->table('menu')->insert($data3);
    }
}
