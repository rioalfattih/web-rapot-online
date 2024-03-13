<?php 

class Model_kelas extends CI_Model{

	function list_kelas()
	{
		$this->db->select('kelas.*, guru.nama_guru');
		$this->db->join('guru', 'kelas.nip_guru=guru.nip');
		return $this->db->get('kelas');
	}

	function isi_kelas($id)
	{
		$this->db->select('siswa.*, kelas.kelas');
		$this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
		$this->db->where('siswa.id_kelas', $id);
		return $this->db->get('siswa');
	}
}
?>