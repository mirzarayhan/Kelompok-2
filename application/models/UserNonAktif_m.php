<?php defined('BASEPATH') or exit('No direct script access allowed');

class UserNonAktif_m extends CI_Model
{
    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->where('status', 'N')
            ->get();
        return $query;
    }
    public function edit($post)
    {
        $params['status'] = 'Y';
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }
}
