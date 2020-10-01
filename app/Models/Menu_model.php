<?php

namespace App\Models;

use CodeIgniter\Model;

class Menu_model extends Model
{
    protected $table = "menu";

    public function getMenu($id = false)
    {
        if ($id === false) {
            return $this->db->table($this->table . " a ")
                ->select(' a.* , b.category_name')->join('categories b ', 'a.menu_category=b.id', 'left')
                ->get()->getResultArray();
        } else {
            return $this->db->table($this->table . " a ")
                ->select(' a.* , b.category_name, b.id')->join('categories b ', 'a.menu_category=b.id', 'left')
                ->getWhere(['a.menu_id' => $id]);
        }
    }

    public function saveMenu($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    public function updateMenu($data, $id)
    {
        $query = $this->db->table($this->table)->update($data, array('menu_id' => $id));
        return $query;
    }

    public function deleteMenu($id)
    {
        $query = $this->db->table($this->table)->delete(array('menu_id' => $id));
        return $query;
    }
}
