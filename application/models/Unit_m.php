<?php defined('BASEPATH') or exit('No direct script access allowed');

class Unit_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('p_unit');
        if ($id != null) {
            $this->db->where('unit_id', $id);
        }
        $this->db->order_by('unit_id', 'asc');
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name'      => $post['unit_name'],
            'address'   => $post['unit_address'],
            'image'     => $post['image'],
            'duration'  => $post['unit_duration'],
            'groupsize' => $post['unit_grupsize'],
            'overview'  => $post['unit_overview'],
            'tourtype'  => $post['unit_type'],
            'language'  => $post['unit_language'],
            'tourcategory'  => $post['unit_categori']
        ];
        $this->db->insert('p_unit', $params);
    }

    public function edit($post)
    {
        $params = [
            'name'      => $post['unit_name'],
            'address'   => $post['unit_address'],
            'duration'  => $post['unit_duration'],
            'groupsize' => $post['unit_grupsize'],
            'overview'  => $post['unit_overview'],
            'tourtype'  => $post['unit_type'],
            'language'  => $post['unit_language'],
            'tourcategory'  => $post['unit_categori'],
            'updated '  => date('Y-m-d  H:i:s')
        ];
        if($post['image'] != null) {
            $params['image'] = $post['image'];
        }
        $this->db->where('unit_id', $post['id']);
        $this->db->update('p_unit', $params);
    }

    public function del($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_unit');
    }
}
