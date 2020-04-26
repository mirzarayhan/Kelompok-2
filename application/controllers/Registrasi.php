<?php

class Registrasi extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('name', 'Name', 'required', [
            'required' => 'Name Wajib diisi!'
        ]);
        $this->form_validation->set_rules('address', 'address', 'required', [
            'required' => 'Address Wajib diisi!'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username Wajib diisi!'
        ]);
        $this->form_validation->set_rules('password_1', 'Password', 'required', [
            'required' => 'Password Wajib diisi!'
        ]);
        $this->form_validation->set_rules('password_2', 'Password', 'required|matches[password_1]', [
            'required' => 'Password Wajib diisi!',
            'matches' => 'Password tidak cocok!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('Registrasi');
            $this->load->view('templates/footer');
        } else {
            date_default_timezone_set('Asia/Jakarta');

            $data = array(
                'user_id'    => '',
                'name'  => $this->input->post('name'),
                'address' => $this->input->post('address'),
                'tanggal_daftar' => date('Y-m-d H:i:s'),
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('password_1'),
                'level'  => 2,
            );

            $this->db->insert('user', $data);
            redirect('Auth/login');
        }
    }
}
