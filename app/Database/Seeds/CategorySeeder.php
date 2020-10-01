<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $data1 = [
            'category_name' => 'Drinks',
            'category_status' => 'Active'
        ];

        $data2 = [
            'category_name' => 'Appetizer',
            'category_status' => 'Active'
        ];

        $data3 = [
            'category_name' => 'Main Course',
            'category_status' => 'Active'
        ];
        $data4 = [
            'category_name' => 'Dessert',
            'category_status' => 'Active'
        ];

        $this->db->table('categories')->insert($data1);
        $this->db->table('categories')->insert($data2);
        $this->db->table('categories')->insert($data3);
        $this->db->table('categories')->insert($data4);
    }
}
