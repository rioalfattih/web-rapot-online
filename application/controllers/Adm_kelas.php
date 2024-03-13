<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_kelas	 extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('Model_kelas');
        if(empty($this->session->userdata('adm_login')))
        {
            redirect("login");
        }
    }

    function index()
    {
    	$dataHeader = array(
    		'title' => "Kelas - Administrator"
    	);
    	$dataKonten = array(
    		'dataKelas' => $this->Model_kelas->list_kelas()->result()
    	);
    	$this->load->view('admin/header', $dataHeader);
    	$this->load->view('admin/kelas/main', $dataKonten);
    	$this->load->view('admin/footer');
    }

    function isi_kelas($id)
    {
    	$dataHeader = array(
    		'title' => "Siswa Kelas - Administrator"
    	);
    	$dataKonten = array(
    		'dataKelas' => $this->Model_kelas->isi_kelas($id)->result()
    	);
    	$this->load->view('admin/header', $dataHeader);
    	$this->load->view('admin/kelas/cari_siswa', $dataKonten);
    	$this->load->view('admin/footer');
    }
}
?>