<?php 

class Model_guru extends CI_Model{

	function list_guru()
	{
		$this->db->select('*');
		return $this->db->get('guru');
	}

	function cek_tambah($nip)
	{
		$this->db->where('nip', $nip);
		$result = $this->db->get('guru')->num_rows();
		if($result>0)
		{
			return false;
		}else{
			return true;
		}
	}

	function act_tambahguru($data = array())
	{
		$cek = $this->cek_tambah($data['nip']);
		if($cek)
		{
			$this->db->set($data);
			return $this->db->insert('guru');
		}else{
			return false;
		}
	}

	function cari_guru($nip)
	{
		$this->db->select('*');
		$this->db->where('nip', $nip);
		return $this->db->get('guru');
	}

	function act_editguru($data = array())
	{
		$this->db->set($data);
		$this->db->where('nip', $data['nip']);
		return $this->db->update('guru');
	}

	function hapus_guru($nip)
	{
		$this->db->where('nip', $nip);
		return $this->db->delete('guru');
	}
}
?>