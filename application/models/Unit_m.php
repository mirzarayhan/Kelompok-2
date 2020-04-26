<?php defined('BASEPATH') or exit('No direct script access allowed');

class Unit_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('p_unit');
        if ($id != null) {
            $this->db->where('unit_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'title'     => $post['title'],
            'address'   => $post['address'],
            'duration'  => $post['duration'],
            'groupsize' => $post['groupsize'],
            'overview'  => $post['overview'],
            'tourtype'  => $post['tourtype'],
            'language'  => $post['language'],
            'category'  => $post['category']
        ];
        $this->db->insert('p_unit', $params);
    }

    public function edit($post)
    {
        $params = [
            'title'     => $post['title'],
            'address'   => $post['address'],
            'duration'  => $post['duration'],
            'groupsize' => $post['groupsize'],
            'overview'  => $post['overview'],
            'tourtype'  => $post['tourtype'],
            'language'  => $post['language'],
            'category'  => $post['category'],
            'updated '  => date('Y-m-d  H:i:s')
        ];
        $this->db->where('unit_id', $post['id']);
        $this->db->update('p_unit', $params);
    }

    public function del($id)
    {
        $this->db->where('unit_id', $id);
        $this->db->delete('p_unit');
    }
}
