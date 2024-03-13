<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard	 extends CI_Controller {

	function __construct() {
    	parent::__construct();
        $this->load->model('Model_siswa_dashboard');
        if(empty($this->session->userdata('usr_login')))
        {
            redirect("login");
        }
    }

    function index()
    {
    	$dataHeader = array(
    		'title' => "Dashboard"
    	);
        $dataKonten = array(
            'info_siswa' => $this->Model_siswa_dashboard->info_siswa()->row_array()
        );
    	$this->load->view('header', $dataHeader);
    	$this->load->view('dashboard', $dataKonten);
    	$this->load->view('footer');
    }
}
?>