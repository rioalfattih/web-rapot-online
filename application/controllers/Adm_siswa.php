<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_siswa	 extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('Model_siswa');
        if(empty($this->session->userdata('adm_login')))
        {
            redirect("login");
        }
    }

    function index()
    {
    	$dataHeader = array(
    		'title' => "Siswa - Administrator"
    	);
    	$dataKonten = array(
    		'dataSiswa' => $this->Model_siswa->list_siswa()->result(),
            'dataKelas' => $this->Model_siswa->list_kelas()->result()
    	);
    	$this->load->view('admin/header', $dataHeader);
    	$this->load->view('admin/siswa/main', $dataKonten);
    	$this->load->view('admin/footer');
    }

    function isi_kelas()
    {
        $id = $this->uri->segment(3);
        if(empty($id))
        {
            $dataKonten = array(
                'dataSiswa' => $this->Model_siswa->default_isi_kelas()->result()
            );
        }else{
            $dataKonten = array(
                'dataSiswa' => $this->Model_siswa->isi_kelas($id)->result()
            );
        }
        $this->load->view('admin/siswa/isi_kelas', $dataKonten);
    }


    function json_siswa($nis)
    {
        $result = $this->Model_siswa->json_siswa($nis)->row_array();
        echo json_encode($result);
    }

    function act_tambahsiswa()
    {
        $data = array(
                'nis' => $this->input->post('nis'),
                'password' => MD5($this->input->post('password')),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jk' => $this->input->post('jk'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'angkatan' => $this->input->post('angkatan'),
                'jurusan' => $this->input->post('jurusan'),
                'id_kelas' => $this->input->post('kelas')
            );
        $result = $this->Model_siswa->tambah_siswa($data);
        if($result)
        {
             $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Tambah Siswa '.$data['nama_siswa'].' Berhasil!'));
        }else{
            $this->session->set_flashdata(array('config' => 'danger', 'pesan' => 'Maaf, NIS sudah digunakan!'));
        }
            redirect("adm_siswa");

    }

    function act_editsiswa()
    {
        if(!empty($this->input->post('password')))
        {
            $data = array(
                'nis' => $this->input->post('nis'),
                'password' => MD5($this->input->post('password')),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jk' => $this->input->post('jk'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'angkatan' => $this->input->post('angkatan'),
                'jurusan' => $this->input->post('jurusan'),
                'id_kelas' => $this->input->post('kelas')
            );
        }else{
            $data = array(
                'nis' => $this->input->post('nis'),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'jk' => $this->input->post('jk'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'angkatan' => $this->input->post('angkatan'),
                'jurusan' => $this->input->post('jurusan'),
                'id_kelas' => $this->input->post('kelas')
            );
        }
        $result = $this->Model_siswa->act_editsiswa($data);
        if($result)
        {
             $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Edit Siswa '.$data['nama_siswa'].' Berhasil!'));
            redirect("adm_siswa");
        }
    }

    function hapus_siswa($nis)
    {
        $result = $this->Model_siswa->hapus_siswa($nis);
        if($result)
        {
            $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Hapus Siswa Berhasil!'));
            redirect("adm_siswa");
        }
    }

    function act_tambahkomentar()
    {
        $data = array(
            'nis' => $this->input->post('nis'),
            'nip' => $this->input->post('nip'),
            'komentar' => $this->input->post('komentar')
        );
        $result = $this->Model_siswa->komentar($data);
        if($result)
        {
            $this->session->set_flashdata(array('config' => 'success', 'pesan' => 'Komentar Berhasil'));
            redirect("adm_siswa");
        }
    }
}
?>