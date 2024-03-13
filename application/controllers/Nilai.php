<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai	 extends CI_Controller {

	function __construct() {
    	parent::__construct();
        $this->load->model('Model_siswa_nilai');
        if(empty($this->session->userdata('usr_login')))
        {
            redirect("login");
        }
    }

    function index()
    {
    	$this->perkelas();
    }

    function perkelas()
    {
        $dataHeader = array(
            'title' => "NILAI PER KELAS"
        );
        $dataKonten = array(
            'dataNilai' => $this->Model_siswa_nilai->perkelas()->result()
        );
        $this->load->view('header', $dataHeader);
        $this->load->view('nilai/main', $dataKonten);
        $this->load->view('footer');
    }

    function seluruh()
    {
        $dataHeader = array(
            'title' => "Dashboard"
        );
        $dataKonten = array(
            'dataNilai' => $this->Model_siswa_nilai->perkelas()->result()
        );
        $this->load->view('header', $dataHeader);
        $this->load->view('nilai/seluruh', $dataKonten);
        $this->load->view('footer');
    }
}
?>