<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        check_not_login();
        check_admin();
        $this->load->model('user_m');
        $this->load->library('form_validation');
        $this->load->model('Cetak_m');
    }

    public function index()
    {
        $data['row'] = $this->user_m->get();
        $this->template->load('template', 'user/user_data', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->user_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->user_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil disimpan');</script>";
        }
        echo "<script>window.location='" . site_url('user') . "'</script>";
    }

    public function add()
    {
        $user = new stdClass();
        $user->user_id      = null;
        $user->name         = null;
        $user->username     = null;
        $user->gender       = null;
        $user->email        = null;
        $user->password     = null;
        $user->passconf     = null;
        $user->address      = null;
        $user->level        = null;

        $this->form_validation->set_rules('fullname', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[user.username]');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules(
            'passconf',
            'Password Confirmation',
            'required|matches[password]',
            ['matches' => '
            Confirm password does not match with password']
        );
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_message('required', 'The %s has not been filled');
        $this->form_validation->set_message('is_unique', 'This %s has already been used');

        $data = [
            'page' => 'add',
            'row' => $user
        ];

        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'user/user_form', $data);
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->add($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil di Tambahkan')</script>";
            }
            echo "<script>window.location='" . site_url('user') . "'</script>";
        }
    }

    public function edit($id)
    {
        $this->load->helper('security');
        $this->form_validation->set_rules('fullname', 'Name', 'required');
        $uname1 = $this->input->post['username'];
        $this->form_validation->set_rules('username', 'username', 'required|min_length[5]|callback_user_check[' . $uname1 . ']');
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->input->post('password')) {
            $this->form_validation->set_rules('password', 'Password', 'min_length[6]');
            $this->form_validation->set_rules(
                'passconf',
                'Password Confirmation',
                'matches[password]',
                ['matches' => '
            Confirm password does not match with password']
            );
        }
        if ($this->input->post('password')) {
            $this->form_validation->set_rules(
                'passconf',
                'Password Confirmation',
                'matches[password]',
                ['matches' => '
            Confirm password does not match with password']
            );
        }
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        // $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_message('required', 'The %s has not been filled');
        $this->form_validation->set_message('is_unique', 'This %s has already been used');

        if ($this->form_validation->run() == FALSE) {
            $query = $this->user_m->get($id);
            if ($query->num_rows() > 0) {
                $user = $query->row();
                $data = [
                    'page' => 'edit',
                    'row' => $user
                ];
                $this->template->load('template', 'user/user_form', $data);
            } else {
                echo "<script>alert('Data tidak ditemukan');";
                echo "window.location='" . site_url('user') . "'</script>";
            }
        } else {
            $post = $this->input->post(null, TRUE);
            $this->user_m->edit($post);
            if ($this->db->affected_rows() > 0) {
                echo "<script>alert('Data Berhasil diupdate')</script>";
            }
            echo "<script>window.location='" . site_url('user') . "'</script>";
        }
    }

    function user_check($uname1)
    {
        $post = $this->input->post(null, TRUE);
        $query = $this->db->query("SELECT * FROM user WHERE username ='$uname1' AND user_id !='$post[user_id]'");
        if ($query->num_rows() > 0) {
            $this->form_validation->set_message('user_check', 'This %s has already been used, please change!');
            return FALSE;
        } else {
            return TRUE;
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
    public function laporan_pdf()
    {
        $data['title'] = 'Report User';
        $data['user'] = $this->Cetak_m->viewUser();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_user.pdf";
        $this->pdf->load_view('user/laporan', $data);
    }
}
