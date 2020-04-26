<?php
class Fungsi
{
    protected $CI;

    function __construct()
    {
        $this->CI = &get_instance();
    }

    function user_login()
    {
        $this->CI->load->model('user_m');
        $user_id = $this->CI->session->userdata('userid');
        $user_data = $this->CI->user_m->get($user_id)->row();
        return $user_data;
    }
    public function count_supplier() {
        $this->CI->load->model('Supplier_m');
        return $this->CI->Supplier_m->get()->num_rows();
    }
    public function count_customer() {
        $this->CI->load->model('Customer_m');
        return $this->CI->Customer_m->get()->num_rows();
    }
    public function count_item() {
        $this->CI->load->model('Item_m');
        return $this->CI->Item_m->get()->num_rows();
    }
    public function count_user() {
        $this->CI->load->model('User_m');
        return $this->CI->User_m->get()->num_rows();
    }
}
