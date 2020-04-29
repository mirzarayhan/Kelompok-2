<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('unit_m');
        $this->load->model('Cetak_m');
    }


    public function index()
    {
        $data['row'] = $this->unit_m->get();
        $this->template->load('template', 'product/unit/unit_data', $data);
    }

    public function proses()
    {
        $config['upload_path']      = './uploads/unit/';
        $config['allowed_types']    = 'gif|jpg|jpeg|png';
        $config['max_size']         = 5120;
        $config['file_name']        = 'unit-'.date('dmy').'-'.substr(md5(rand()));
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            
            if(@$_FILES['image']['name'] != null) {
                if($this->upload->do_upload('image')) {
                    $post['image']  =   $this->upload->data('file_name');
                    $this->unit_m->add($post); 
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data has been successfully saved!!');
                    }
                    redirect('unit');
                }else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('unit/add');
                }  
            }else {
                $post['image']  = null;
                $this->unit_m->add($post); 
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data has been successfully saved!!');
                }
                redirect('unit');
            }
        } else if (isset($_POST['edit'])) {
            if(@$_FILES['image']['name'] != null) {
                if($this->upload->do_upload('image')) {
                    $unit = $this->unit_m->get($post['id'])->row();
                    if($unit->image != null) {
                        $target_file = './uploads/unit/'. $unit->image;
                        unlink($target_file);
                    }
                    $post['image']  =   $this->upload->data('file_name');
                    $this->unit_m->edit($post); 
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data has been successfully saved!!');
                    }
                    redirect('unit');
                }else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('unit/add');
                }
            }else {
                $post['image']  = null;
                $this->unit_m->edit($post); 
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data has been successfully saved!!');
                }
                redirect('unit');
            }
        }
    }

    public function add()
    {
        $unit = new stdClass();
        $unit->unit_id = null;
        $unit->name = null;
        $unit->address = null;
        $unit->duration = null;
        $unit->groupsize = null;
        $unit->overview = null;
        $unit->language = null;
        $data = [
            'page' => 'add',
            'row' => $unit
        ];
        $this->template->load('template', 'product/unit/unit_form', $data);
    }

    public function edit($id)
    {
        $query = $this->unit_m->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = [
                'page' => 'edit',
                'row' => $unit
            ];
            $this->template->load('template', 'product/unit/unit_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            $this->session->set_flashdata('success', 'data not found');
            redirect('unit');
        }
    }

    public function delete()
    {
        $unit = $this->unit_m->get($id)->row();
        if($unit->image != null) {
            $target_file = './uploads/unit/'. $unit->image;
            unlink($target_file);
        }
        $id = $this->input->post('unit_id');
        $this->unit_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data has been successfully deleted!!');
        }
        redirect('unit');
    }
    public function laporan_pdf()
    {
        $data['title'] = 'Report Unit';
        $data['unit'] = $this->Cetak_m->viewUnit();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_unit.pdf";
        $this->pdf->load_view('product/unit/laporan', $data);
    }
}
