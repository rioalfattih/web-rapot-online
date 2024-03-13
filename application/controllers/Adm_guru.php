<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_guru	 extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('Model_guru');
        if(empty($this->session->userdata('adm_login')))
        {
            redirect("login");
        }
    }

    function index()
    {
    	$dataHeader = array(
    		'title' => "Guru - Administrator"
    	);
    	$dataKonten = array(
    		'dataGuru' => $this->Model_guru->list_guru()->result()
    	);
    	$this->load->view('admin/header', $dataHeader);
    	$this->load->view('admin/guru/main', $dataKonten);
    	$this->load->view('admin/footer');
    }

    function act_tambahguru()
    {
        if(!empty($this->input->post('submit'))){
            $data = array(
                'nip' => $this->input->post('nip'),
                'password' => MD5($this->input->post('password')),
                'nama_guru' => $this->input->post('nama_guru'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jk' => $this->input->post('jk'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            );
            $result = $this->Model_guru->act_tambahguru($data);
            if($result){
                $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Tambah Guru Berhasil'));
            }else{
                $this->session->set_flashdata(array('config' => 'danger', 'pesan' => 'Maaf, NIP guru sudah digunakan!'));
            }
            redirect("adm_guru");
        }else{
            redirect('adm_guru');
        }
    }

    function act_editguru()
    {
        if(!empty($this->input->post('password')))
        {
            $data = array(
                'nip' => $this->input->post('nip'),
                'password' => MD5($this->input->post('password')),
                'nama_guru' => $this->input->post('nama_guru'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jk' => $this->input->post('jk'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            );

        }else{
            $data = array(
                'nip' => $this->input->post('nip'),
                'nama_guru' => $this->input->post('nama_guru'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jk' => $this->input->post('jk'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat')
            );
        }
        $result = $this->Model_guru->act_editguru($data);
        if($result){
            $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Edit Guru '.$data['nama_guru'].' Berhasil'));
            redirect("adm_guru");
        }
    }

    function hapus_guru($nip)
    {
        $result = $this->Model_guru->hapus_guru($nip);
        if($result)
        {
            $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Hapus Guru Berhasil'));
            redirect("adm_guru");
        }
    }

    function json_guru($nip)
    {
        $result = $this->Model_guru->cari_guru($nip)->row_array();
        echo json_encode($result);
    }
}
?>