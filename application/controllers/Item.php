<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['item_m', 'category_m', 'unit_m']);
        $this->load->model('Cetak_m');
    }

    public function index()
    {
        $data['row'] = $this->item_m->get();
        $this->template->load('template', 'product/item/item_data', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            if($this->item_m->check_barcode($post['barcode'])->num_rows() >0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] already used!!");
                redirect('item/add');
            }else {
                $this->item_m->add($post);
            }
        } else if (isset($_POST['edit'])) {
            if($this->item_m->check_barcode($post['barcode'], $post['id'])->num_rows() >0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] already used!!");
                redirect('item/edit/'. $post['id']);
            }else {
                $this->item_m->edit($post);
            }
        }

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data has been successfully saved!!');
        }
        redirect('item');
    }

    public function add()
    {
        $item                   = new stdClass();
        $item->item_id          = null;
        $item->barcode          = null;
        $item->name             = null;
        $item->price            = null;
        $item->category_id      = null;
        
        $query_category = $this->category_m->get();  
        $query_unit     = $this->unit_m->get();
        $unit[null]     = '- Choose -';
        foreach($query_unit->result() as $unt) {
            $unit[$unt->unit_id] = $unt->name;
        }
        $data = array(
            'page'      => 'add',
            'row'       =>  $item,
            'category'  =>  $query_category,
            'unit'      =>  $unit, 'selectedunit' => null,
        );
        $this->template->load('template', 'product/item/item_form', $data);
    }

    public function edit($id)
    {
        $query = $this->item_m->get($id);
        if ($query->num_rows() > 0) {
            $item = $query->row();
            $query_category = $this->category_m->get();  
            $query_unit     = $this->unit_m->get();
            $unit[null]     = '- Choose -';
            foreach($query_unit->result() as $unt) {
                $unit[$unt->unit_id] = $unt->name;
        }
        $data = array(
            'page'      => 'edit',
            'row'       =>  $item,
            'category'  =>  $query_category,
            'unit'      =>  $unit, 'selectedunit' => $item->unit_id,
        );
        $this->template->load('template', 'product/item/item_form', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            $this->session->set_flashdata('success', 'data not found');
            redirect('item');
        }
    }

    public function delete()
    {
        $id = $this->input->post('item_id');
        $this->item_m->del($id);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data has been successfully deleted!!');
        }
        redirect('item');
    }
    public function laporan_pdf() {
        $data['title'] = 'Report Item';
        $data['item'] = $this->Cetak_m->viewitem();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_item.pdf";
        $this->pdf->load_view('product/item/laporan', $data);
    }
    public function barcode_qrcode($id) {
        $data['row'] = $this->item_m->get($id)->row();
        $this->template->load('template', 'product/item/barcode_qrcode', $data);
    }
    public function barcode_print($id) {
        $data['row'] = $this->item_m->get($id)->row();
        $html = $this->load->view('product/item/barcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'barcode-'.$data['row']->barcode, 'A4', 'landscape');
    }
    public function qrcode_print($id) {
        $data['row'] = $this->item_m->get($id)->row();
        $html = $this->load->view('product/item/qrcode_print', $data, true);
        $this->fungsi->PdfGenerator($html, 'qrcode-'.$data['row']->barcode, 'A4', 'portrait');
    }
}