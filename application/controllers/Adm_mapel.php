<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_mapel	 extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('Model_mapel');
        if(empty($this->session->userdata('adm_login')))
        {
            redirect("login");
        }
    }

    function index()
    {
    	$dataHeader = array(
    		'title' => "Mata Pelajaran - Administrator"
    	);
    	$dataKonten = array(
    		'dataMapel' => $this->Model_mapel->list_mapel()->result()
    	);
    	$this->load->view('admin/header', $dataHeader);
    	$this->load->view('admin/mapel/main', $dataKonten);
    	$this->load->view('admin/footer');
    }

    function act_tambah()
    {
        $data = array(
            'kode_mapel' => $this->input->post('kode_mapel'),
            'nama_mapel' => $this->input->post('nama_mapel')
        );
        $sqlcek = $this->db->get_where('mapel', array('kode_mapel' => $data['kode_mapel']));
        $cek = $sqlcek->num_rows();
        if($cek>0){
            $this->session->set_flashdata(array('config' => 'danger', 'pesan' => 'Tambah Mata Pelajaran '.$data['nama_mapel'].' Gagal!'));
            redirect('adm_mapel');
        }else{
            $result = $this->Model_mapel->tambah($data);
            if($result)
            {
                $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Tambah Mata Pelajaran '.$data['nama_mapel'].' Berhasil!'));
                redirect('adm_mapel');
            }
        }
    }

    function act_edit()
    {
        $data = array(
            'kode_mapel' => $this->input->post('kode_mapel'),
            'nama_mapel' => $this->input->post('nama_mapel')
        );
        $result = $this->Model_mapel->edit($data);
        if($result)
        {
            $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Edit Mata Pelajaran '.$data['nama_mapel'].' Berhasil!'));
            redirect('adm_mapel');
        }
    }
}
?>