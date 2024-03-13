<?php 

class Model_nilai extends CI_Model{

	function list_nilai()
	{
		$this->db->select('nilai_siswa.*, mapel.nama_mapel, siswa.nama_siswa, kelas.kelas');
		$this->db->join('mapel', 'nilai_siswa.kd_mapel=mapel.kode_mapel');
		$this->db->join('siswa', 'nilai_siswa.nis=siswa.nis');
		$this->db->join('kelas', 'nilai_siswa.id_kelas=kelas.id_kelas');
		$this->db->order_by('nilai_siswa.id_nilai', 'DESC');
		return $this->db->get('nilai_siswa');
	}

	function cari_siswa($nis)
	{
		$this->db->where('nis', $nis);
		return $this->db->get('siswa');
	}

	function mapel()
	{
		return $this->db->get('mapel');
	}

	function kelas()
	{
		return $this->db->get('kelas');
	}

	function act_tambahnilai($data = array())
	{
		$this->db->set($data);
		return $this->db->insert('nilai_siswa');
	}

	function json_nilai_siswa($id_nilai)
	{
		$this->db->select('nilai_siswa.*, siswa.nama_siswa');
		$this->db->join('siswa', 'nilai_siswa.nis=siswa.nis');
		$this->db->where('id_nilai', $id_nilai);
		return $this->db->get('nilai_siswa');
	}

	function act_editnilai($data = array())
	{
		$this->db->set($data);
		$this->db->where('id_nilai', $data['id_nilai']);
		return $this->db->update('nilai_siswa');
	}

	function hapus_nilai($id)
	{
		$this->db->where('id_nilai', $id);
		return $this->db->delete('nilai_siswa');
	}

	
}
?>