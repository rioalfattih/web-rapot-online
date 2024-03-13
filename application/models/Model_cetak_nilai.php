<?php 

class Model_cetak_nilai extends CI_Model
{
	
	function ambil_kelas()
	{
		$nis = $this->session->userdata('usr_login');
		$this->db->select('kelas.*');
		$this->db->join('kelas', 'nilai_siswa.id_kelas=kelas.id_kelas');
		$this->db->where('nilai_siswa.nis', $nis);
		$this->db->group_by('nilai_siswa.id_kelas');
		return $this->db->get('nilai_siswa');
	}

	function cari_siswa()
	{
		$nis = $this->session->userdata('usr_login');
		$this->db->select('*');
		$this->db->where('nis', $nis);
		return $this->db->get('siswa');
	}

	function cari_nilai($id)
	{
		$this->db->select('nilai_siswa.*, mapel.nama_mapel, kelas.kelas');
		$this->db->join('mapel', 'nilai_siswa.kd_mapel=mapel.kode_mapel');
		$this->db->join('kelas', 'nilai_siswa.id_kelas=kelas.id_kelas');
		$this->db->where('nilai_siswa.id_kelas', $id);
		return $this->db->get('nilai_siswa');
	}

	function komentar($nis)
	{
		$this->db->select('guru.nama_guru, komentar.komentar');
		$this->db->join('guru', 'komentar.nip=guru.nip');
		$this->db->where('komentar.nis', $nis);
		return $this->db->get('komentar');
	}
}
?>