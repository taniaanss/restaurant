<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class OutputSeeder extends Seeder
{

    public function run()
    {
        $myTime = new Time('now', 'Asia/Jakarta', 'en_ID');

        $data1 = [
            'menu_id' => 1,
            'customer_id' => 1,
            'amount' =>  12,
            'time' => $myTime,
            'createdBy' => 'Tania',
        ];



        $this->db->table('outputs')->insert($data1);
    }
}
