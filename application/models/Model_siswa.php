<?php 

class Model_siswa extends CI_Model{

	function list_siswa()
	{
		$this->db->select('siswa.*, kelas.kelas');
		$this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
		return $this->db->get('siswa');
	}

	function json_siswa($nis)
	{
		$this->db->where('nis', $nis);
		return $this->db->get('siswa');
	}

	function act_editsiswa($data = array())
	{
		$this->db->set($data);
		$this->db->where('nis', $data['nis']);
		return $this->db->update('siswa');
	}

	function hapus_siswa($nis)
	{
		$this->db->where('nis', $nis);
		return $this->db->delete('siswa');
	}

	function cek_siswa($nis)
	{
		$this->db->where('nis', $nis);
		$result = $this->db->get('siswa')->num_rows();
		if($result>0)
		{
			return false;
		}else{
			return true;
		}
	}

	function tambah_siswa($data = array())
	{
		$cek = $this->cek_siswa($data['nis']);
		if($cek)
		{
			$this->db->set($data);
			return $this->db->insert('siswa');
		}else{
			return false;
		}
	}

	function default_isi_kelas()
	{
		$this->db->select('siswa.*, kelas.kelas');
		$this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
		return $this->db->get('siswa');
	}

	function isi_kelas($id)
	{
		$this->db->select('siswa.*, kelas.kelas');
		$this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
		$this->db->where('kelas.id_kelas', $id);
		return $this->db->get('siswa');
	}

	function list_kelas()
	{
		return $this->db->get('kelas');
	}

	function cek_komentar($nis)
	{
		$this->db->where('nis', $nis);
		$result = $this->db->get('komentar')->num_rows();
		if($result>0)
		{
			return false;
		}else{
			return true;
		}
	}

	function komentar($data = array())
	{
		$cek = $this->cek_komentar($data['nis']);
		if($cek)
		{
			$result = $this->tambah_komentar($data);
		}else{
			$result = $this->edit_komentar($data);
		}
		return $result;
	}

	function edit_komentar($data = array())
	{
		$this->db->set($data);
		$this->db->where('nis', $data['nis']);
		return $this->db->update('komentar');
	}

	function tambah_komentar($data = array())
	{
		$this->db->set($data);
		return $this->db->insert('komentar');
	}

}
?>