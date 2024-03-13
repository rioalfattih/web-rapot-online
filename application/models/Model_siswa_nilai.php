<?php 

class Model_siswa_nilai extends CI_Model{

	function perkelas()
	{
		$nis = $this->session->userdata('usr_login');
		$this->db->select('nilai_siswa.*, kelas.kelas, mapel.nama_mapel');
		$this->db->join('kelas', 'nilai_siswa.id_kelas=kelas.id_kelas');
		$this->db->join('mapel', 'nilai_siswa.kd_mapel=mapel.kode_mapel');
		$this->db->where('nilai_siswa.nis', $nis);
		$this->db->order_by('nilai_siswa.id_kelas', 'ASC');
		return $this->db->get('nilai_siswa');
	}

	function seluruh_nilai()
	{
		$this->db->select('*');
		return $this->db->get('siswa');
	}
}
?>