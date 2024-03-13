<?php 

class Model_mapel extends CI_Model{

	function list_mapel()
	{
		$this->db->select('*');
		return $this->db->get('mapel');
	}

	function tambah($data = array())
	{
		$this->db->set($data);
		return $this->db->insert('mapel');
	}

	function edit($data = array())
	{
		$this->db->where('kode_mapel', $data['kode_mapel']);
		$this->db->set($data);
		return $this->db->update('mapel');
	}
}
?>