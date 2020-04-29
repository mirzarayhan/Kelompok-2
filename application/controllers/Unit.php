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
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->unit_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->unit_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data has been successfully saved');
        }
        redirect('unit');
    }

    public function add()
    {
        $unit               = new stdClass();
        $unit->unit_id      = null;
        $unit->name         = null;
        $unit->address      = null;
        $unit->duration     = null;
        $unit->groupsize    = null;
        $unit->overview     = null;
        $unit->language     = null;
        $data = [
            'page'      => 'add',
            'category'  => $this->Category_m->dropdownList(),
            'type'      => $this->Type_m->dropdownList(),
            'row'       => $unit
        ];
        $this->template->load('template', 'product/unit/unit_form', $data);
    }

    public function edit($id)
    {
        $query = $this->unit_m->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $data = [
                'page'      => 'edit',
                'category'  => $this->Category_m->dropdownList(),
                'type'      => $this->Type_m->dropdownList(),
                'row'       => $unit
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
        $id = $this->input->post('unit_id');
        $this->unit_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'data has been successfully deleted');
        }
        redirect('unit');
    }
    public function laporan_pdf()
    {
        $data['title']  = 'Report Unit';
        $data['type']   = $this->Cetak_m->viewUnit();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_unit.pdf";
        $this->pdf->load_view('product/unit/laporan', $data);
    }
}
