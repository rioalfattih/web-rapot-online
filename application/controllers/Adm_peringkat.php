<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_peringkat	 extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('Model_peringkat');
        if(empty($this->session->userdata('adm_login')))
        {
            redirect("login");
        }
    }

    function index()
    {
    	$dataHeader = array(
    		'title' => 'Peringkat - Administrator'
    	);
    	$dataKonten = array(
    		'kelas' => $this->Model_peringkat->list_kelas()->result(),
    		'peringkat1' => $this->Model_peringkat->peringkat(1)->result(),
    		'peringkat2' => $this->Model_peringkat->peringkat(2)->result(),
    		'peringkat3' => $this->Model_peringkat->peringkat(3)->result(),
    		'peringkat4' => $this->Model_peringkat->peringkat(4)->result(),
    		'peringkat5' => $this->Model_peringkat->peringkat(5)->result(),
    		'peringkat6' => $this->Model_peringkat->peringkat(6)->result()
    	);
    	$this->load->view('admin/header', $dataHeader);
    	$this->load->view('admin/peringkat/main', $dataKonten);
    	$this->load->view('admin/footer');
    }
}
?>