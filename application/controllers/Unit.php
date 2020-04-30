<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['Unit_m', 'category_m', 'Unit_m']);
        $this->load->model('Cetak_m');
    }

    public function index()
    {
        $data['row'] = $this->Unit_m->get();
        $this->template->load('template', 'product/unit/unit_data', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if ($this->Unit_m->check_barcode($post['barcode'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] already used!!");
                redirect('unit/add');
            } else {
                $this->Unit_m->add($post);
            }
        } else if (isset($_POST['edit'])) {
            if ($this->Unit_m->check_barcode($post['barcode'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] already used!!");
                redirect('unit/edit/' . $post['id']);
            } else {
                $this->Unit_m->edit($post);
            }
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data has been successfully saved!!');
        }
        redirect('unit');
    }

    public function add()
    {
        $unit                   = new stdClass();
        $unit->unit_id          = null;
        $unit->barcode          = null;
        $unit->name             = null;
        $unit->price            = null;
        $unit->category_id      = null;

        $query_category = $this->category_m->get();
        $query_unit     = $this->Unit_m->get();
        $unit[null]     = '- Choose -';
        foreach ($query_unit->result() as $unt) {
            $unit[$unt->unit_id] = $unt->name;
        }
        $data = array(
            'page'      => 'add',
            'row'       =>  $unit,
            'category'  =>  $query_category,
            'unit'      =>  $unit, 'selectedunit' => null,
        );
        $this->template->load('template', 'product/unit/unit_form', $data);
    }

    public function edit($id)
    {
        $query = $this->Unit_m->get($id);
        if ($query->num_rows() > 0) {
            $unit = $query->row();
            $query_category = $this->category_m->get();
            $query_unit     = $this->Unit_m->get();
            $unit[null]     = '- Choose -';
            foreach ($query_unit->result() as $unt) {
                $unit[$unt->unit_id] = $unt->name;
            }
            $data = array(
                'page'      => 'edit',
                'row'       =>  $unit,
                'category'  =>  $query_category,
                'unit'      =>  $unit, 'selectedunit' => $unit->unit_id,
            );
            $this->template->load('template', 'product/unit/unit_form', $data);
        } else {
            echo "<script>alert('Data tidak dunitukan');";
            $this->session->set_flashdata('success', 'data not found');
            redirect('unit');
        }
    }

    public function delete()
    {
        $id = $this->input->post('unit_id');
        $this->Unit_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data has been successfully deleted!!');
        }
        redirect('unit');
    }
    public function laporan_pdf()
    {
        $data['title'] = 'Report unit';
        $data['unit'] = $this->Cetak_m->viewunit();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_unit.pdf";
        $this->pdf->load_view('product/unit/laporan', $data);
    }
    public function barcode_qrcode($id)
    {
        $data['row'] = $this->Unit_m->get($id)->row();
        $this->template->load('template', 'product/unit/barcode_qrcode', $data);
    }
    public function barcode_print($id)
    {
        $data['row'] = $this->Unit_m->get($id)->row();
        $html = $this->load->view('product/unit/barcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'barcode-' . $data['row']->barcode, 'A4', 'landscape');
    }
    public function qrcode_print($id)
    {
        $data['row'] = $this->Unit_m->get($id)->row();
        $html = $this->load->view('product/unit/qrcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'qrcode-' . $data['row']->barcode, 'A4', 'portrait');
    }
}
