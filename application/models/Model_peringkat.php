<?php 

class Model_peringkat extends CI_Model{

	function list_kelas()
	{
		$this->db->order_by('id_kelas', 'ASC');
		return $this->db->get('kelas');
	}

	function peringkat($id_kelas)
	{
		$this->db->select('siswa.nis, siswa.nama_siswa, SUM(nilai_siswa.nilai) as nilaitotal');
		$this->db->join('siswa' ,'nilai_siswa.nis=siswa.nis');
		$this->db->where('nilai_siswa.id_kelas', $id_kelas);
		$this->db->group_by('nilai_siswa.nis');
		$this->db->order_by('nilaitotal', 'DESC');
		$this->db->limit(3);
		return $this->db->get('nilai_siswa');
	}
}
?>