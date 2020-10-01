<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class InputSeeder extends Seeder
{


    public function run()
    {
        $myTime = new Time('now', 'Asia/Jakarta', 'en_ID');

        $data1 = [
            'menu_id' => 1,
            'supplier_id' => 1,
            'amount' =>  12,
            'time' => $myTime,
            'createdBy' => 'Tania',
        ];



        $this->db->table('inputs')->insert($data1);
    }
}
