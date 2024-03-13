<?php

class Cetak_nilai extends CI_Controller
{
	
	function __construct() {
    	parent::__construct();
        $this->load->model('Model_cetak_nilai');
        if(empty($this->session->userdata('usr_login')))
        {
            redirect("login");
        }
    }

	function index()
	{
		$dataHeader = array(
            'title' => 'Cetak Nilai'
        );
        $dataKonten = array(
            'dataKelas' => $this->Model_cetak_nilai->ambil_kelas()->result()
        );
        $this->load->view('header', $dataHeader);
        $this->load->view('cetak/main', $dataKonten);
        $this->load->view('footer');
	}

    function print()
    {
        $id_kelas = $this->input->get('id_kelas');
        if(!empty($id_kelas)){
            $dataSiswa = $this->Model_cetak_nilai->cari_siswa()->row_array();
            $data = array(
                'dataSiswa' => $dataSiswa,
                'dataNilai' => $this->Model_cetak_nilai->cari_nilai($id_kelas)->result(),
                'komentar' => $this->Model_cetak_nilai->komentar($dataSiswa['nis'])->row_array()
            );
            $this->load->view('cetak/print', $data);
        }else{
            redirect('cetak_nilai');
        }
    }
}
?>