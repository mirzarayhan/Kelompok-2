<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserNonAktif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('userNonAktif_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['row'] = $this->userNonAktif_m->get();
        $this->template->load('template', 'userNonAktif/userNonAktif_data', $data);
    }

    public function edit($id)
    {
        $this->load->helper('security');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_message('required', 'The %s has not been filled');

        if ($this->form_validation->run() == FALSE) {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('userNonAktif') . "'</script>";
        } else {
            $post = $this->input->post(null, TRUE);
            $this->userNonAktif_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil diupdate')</script>";
            } else {
                echo "<script>alert('Data Gagal diupdate')</script>";
            }
            echo "<script>window.location='" . site_url('userNonAktif') . "'</script>";
        }
    }

    public function delete()
    {
        $id = $this->input->post('user_id');
        $this->user_m->del($id);

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil di Hapus')</script>";
        }
        echo "<script>window.location='" . site_url('user') . "'</script>";
    }
}
