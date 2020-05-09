<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('category_m');
        $this->load->model('Cetak_m');
    }
    
    public function index()
    {
        $this->template->load('template_c', 'client/index');
    }

}

/* End of file Controllername.php */


?>