<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('supplier_m');
        $this->load->model('Cetak_m');
    }

    public function index()
    {
        $data['row'] = $this->supplier_m->get();
        $this->template->load('template', 'supplier/supplier_data', $data);
    }

    public function proses()
    {
        $post = $this->input->post(null, TRUE);
        if (isset($_POST['add'])) {
            $this->supplier_m->add($post);
        } else if (isset($_POST['edit'])) {
            $this->supplier_m->edit($post);
        }

        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Berhasil disimpan');</script>";
        }
        echo "<script>window.location='" . site_url('supplier') . "'</script>";
    }

    public function add()
    {
        $supplier               = new stdClass();
        $supplier->supplier_id  = null;
        $supplier->name         = null;
        $supplier->phone        = null;
        $supplier->address      = null;
        $supplier->description  = null;
        $data       = [
            'page'  => 'add',
            'row'   => $supplier
        ];
        $this->template->load('template', 'supplier/supplier_form_add', $data);
    }

    public function edit($id)
    {
        $query = $this->supplier_m->get($id);
        if ($query->num_rows() > 0) {
            $supplier   = $query->row();
            $data       = [
                'page'  => 'edit',
                'row'   => $supplier
            ];
            $this->template->load('template', 'supplier/supplier_form_add', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('supplier') . "'</script>";
        }
    }

    public function delete()
    {
        $id         = $this->input->post('supplier_id');
        $this->supplier_m->del($id);
        $error      = $this->db->error();

        if ($error['code'] != 0) {
            echo "<script>alert('Data Tidak dapat di Hapus ( Sudah berelasi dengan tabel lain )');</script>";
        } else {
            echo "<script>alert('Data Berhasil di Hapus');</script>";
        }
        echo "<script>window.location='" . site_url('supplier') . "';</script>";
    }

    public function laporan_pdf()
    {
        $data['title'] = 'Report Supplier';
        $data['supplier'] = $this->Cetak_m->viewSupplier();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_supplier.pdf";
        $this->pdf->load_view('supplier/laporan', $data);
    }
}
