<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $this->db->where('status', 'Y');
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->where('status', 'Y')->get();
        return $query;
    }

    public function add($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['email'] = $post['email'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'];
        $params['level'] = $post['level'];
        $params['status'] = "N";
        $this->db->insert('user', $params);
    }

    public function addRegister($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['email'] = $post['email'];
        $params['password'] = sha1($post['password']);
        $params['address'] = $post['address'];
        $params['level'] = 2;
        $params['status'] = "N";
        $this->db->insert('user', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user');
    }

    public function edit($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        $params['email'] = $post['email'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['address'] = $post['address'];
        $params['level'] = $post['level'];
        $params['status'] = $post['status'];
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user', $params);
    }
}
