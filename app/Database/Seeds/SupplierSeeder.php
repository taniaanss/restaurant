<?php
namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;

class SupplierSeeder extends Seeder
{
    
    public function run()
    {
        $data1 = [
            'supplier_name' => 'Tania AR',
            'supplier_phone' => '089654121009',
            'lat' => '-6.577984173417287',
            'long' => '106.75741363115566',
            'street' => 'Sindang Barang',
            'city' => 'Bogor Barat',
            'country' => 'Bogor'
        ];

     

        $this->db->table('suppliers')->insert($data1);
    }
}
