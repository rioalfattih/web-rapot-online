<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_dashboard	 extends CI_Controller {

	function __construct() {
    	parent::__construct();
        if(empty($this->session->userdata('adm_login')))
        {
            redirect("login");
        }
    }

    function index()
    {
    	$dataHeader = array(
    		'title' => "Dashboard - Administrator"
    	);
    	$this->load->view('admin/header', $dataHeader);
    	$this->load->view('admin/dashboard');
    	$this->load->view('admin/footer');
    }
}
?>