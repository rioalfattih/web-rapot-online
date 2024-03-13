<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_nilai	 extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('Model_nilai');
        if(empty($this->session->userdata('adm_login')))
        {
            redirect("login");
        }
    }

    function index()
    {
    	$dataHeader = array(
    		'title' => "Nilai - Administrator"
    	);
    	$dataKonten = array(
    		'dataNilai' => $this->Model_nilai->list_nilai()->result(),
            'mapel' => $this->Model_nilai->mapel()->result(),
            'kelas' => $this->Model_nilai->kelas()->result()
    	);
    	$this->load->view('admin/header', $dataHeader);
    	$this->load->view('admin/nilai/main', $dataKonten);
    	$this->load->view('admin/footer');
    }

    function json_cari_siswa($nis)
    {
        $result = $this->Model_nilai->cari_siswa($nis)->row_array();
        echo json_encode($result);
    }

    function act_tambahnilai()
    {
        if(!empty($this->input->post('submit')))
        {
            $data = array(
                'kd_mapel' => $this->input->post('kd_mapel'),
                'nis' => $this->input->post('nis'),
                'id_kelas' => $this->input->post('id_kelas'),
                'semester' => $this->input->post('semester'),
                'nilai' => $this->input->post('nilai')
            );
            $result = $this->Model_nilai->act_tambahnilai($data);
            if($result)
            {
                 $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Tambah Nilai Berhasil'));
                redirect("adm_nilai");
            }
        }else{
            redirect('adm_nilai');
        }
    }

    function act_editnilai()
    {
        if(!empty($this->input->post('submit')))
        {
            $data = array(
                'id_nilai' => $this->input->post('id_nilai'),
                'kd_mapel' => $this->input->post('kd_mapel'),
                'nis' => $this->input->post('nis'),
                'id_kelas' => $this->input->post('id_kelas'),
                'semester' => $this->input->post('semester'),
                'nilai' => $this->input->post('nilai')
            );
            $result = $this->Model_nilai->act_editnilai($data);
            if($result)
            {
                 $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Edit Nilai Berhasil'));
                redirect("adm_nilai");
            }
        }else{
            redirect('adm_nilai');
        }
    }

    function hapus_nilai($id)
    {
        $result = $this->Model_nilai->hapus_nilai($id);
        if($result)
        {
            $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Hapus Nilai Berhasil'));
            redirect("adm_nilai");
        }
    }

    function json_nilai_siswa($id_nilai)
    {
        $result = $this->Model_nilai->json_nilai_siswa($id_nilai)->row_array();
        echo json_encode($result);
    }
}
?>