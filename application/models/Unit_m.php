<?php defined('BASEPATH') or exit('No direct script access allowed');

class Unit_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->select('p_unit.*, p_category.name as category_name, p_item.name as item_name');
        $this->db->from('p_unit');
        $this->db->join('p_category', 'p_category.category_id = p_unit.category_id');
        $this->db->join('p_item', 'p_item.item_id = p_unit.item_id');

        if ($id != null) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function dropdownList()
    {
        $results = $this->db->select('id, name')
            ->where('status', 'aktif')
            ->get('p_unit')
            ->result_array();

        return array_column($results, 'name', 'id');
    }

    public function add($post)
    {
        $params = [
            'barcode'       => $post['barcode'],
            'name'          => $post['product_name'],
            'category_id'   => $post['category'],
            'unit_id'       => $post['unit'],
            'price'         => $post['price'],
        ];
        $this->db->insert('p_unit', $params);
    }

    public function edit($post)
    {
        $params = [
            'barcode'       => $post['barcode'],
            'name'          => $post['product_name'],
            'category_id'   => $post['category'],
            'unit_id'       => $post['unit'],
            'price'         => $post['price'],
            'updated '      => date('Y-m-d  H:i:s')
        ];
        $this->db->where('unit_id', $post['id']);
        $this->db->update('p_unit', $params);
    }
    function check_barcode($code, $id = null)
    {
        $this->db->from('p_unit');
        $this->db->where('barcode', $code);
        if ($id != null) {
            $this->db->where('unit_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_unit');
    }
}
