<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    
    public function run()
    {
        $data1 = [
            'customer_name' => 'Tania AR',
            'customer_phone' => '089654121009',
            'lat' => '-6.577984173417287',
            'long' => '106.75741363115566',
            'street' => 'Sindang Barang',
            'city' => 'Bogor Barat',
            'country' => 'Bogor'
        ];

     

        $this->db->table('customers')->insert($data1);
       
    }
}
