<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cetak_m extends CI_Model
{
    public function viewSupplier() {
        $this->db->select('name, phone, address, description');
        $query = $this->db->get('supplier');
        return $query->result();
    }
    public function viewCustomer() {
        $this->db->select('*');
        $query = $this->db->get('customer');
        return $query->result();
    }
    public function viewUser() {
        $this->db->select('*');
        $query = $this->db->get('user');
        return $query->result();
    }
    public function viewCategory() {
        $this->db->select('*');
        $query = $this->db->get('p_category');
        return $query->result();
    }
    public function viewType() {
        $this->db->select('*');
        $query = $this->db->get('p_type');
        return $query->result();
    }
    public function viewUnit() {
        $this->db->select('*');
        $query = $this->db->get('p_unit');
        return $query->result();
    }
    public function viewItem() {
        $this->db->select('*');
        $query = $this->db->get('p_item');
        return $query->result();
    }
}
