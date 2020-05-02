<?php defined('BASEPATH') or exit('No direct script access allowed');

class Item_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('p_item');
        if ($id != null) {
            $this->db->where('item_id', $id);
        }
        $this->db->order_by('item_id', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name'      => $post['item_name'],
            'address'   => $post['item_address'],
            'image'     => $post['image'],
            'duration'  => $post['item_duration'],
            'groupsize' => $post['item_grupsize'],
            'overview'  => $post['item_overview'],
            'tourtype'  => $post['item_type'],
            'language'  => $post['item_language'],
            'tourcategory'  => $post['item_categori']
        ];
        $this->db->insert('p_item', $params);
    }

    public function edit($post)
    {
        $params = [
            'name'      => $post['item_name'],
            'address'   => $post['item_address'],
            'duration'  => $post['item_duration'],
            'groupsize' => $post['item_grupsize'],
            'overview'  => $post['item_overview'],
            'tourtype'  => $post['item_type'],
            'language'  => $post['item_language'],
            'tourcategory'  => $post['item_categori'],
            'updated '  => date('Y-m-d  H:i:s')
        ];
        if ($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('item_id', $post['id']);
        $this->db->update('p_item', $params);
    }

    public function del($id)
    {
        $this->db->where('item_id', $id);
        $this->db->delete('p_item');
    }
}
