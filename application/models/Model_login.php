<?php
class Model_login extends CI_Model
{
	function guru($data = array())
	{
		$this->db->where('nip', $data['username']);
		$this->db->where('password', $data['password']);
		$result = $this->db->get('guru')->row_array();
		return $result;
	}

	function admin($data = array())
	{
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		$result = $this->db->get('admin')->row_array();
		return $result;
	}

	function cek_admin($data = array())
	{
		$guru = $this->guru($data);
		$admin = $this->admin($data);
		if($guru)
		{
			$this->session->set_userdata('adm_login', $guru['nip']);
			return true;
		}else if($admin){
			$this->session->set_userdata('adm_login', $admin['username']);
			return true;
		}else{
			return false;
		}
	}

	function cek_siswa($data = array())
	{
		$this->db->where('nis', $data['username']);
		$this->db->where('password', $data['password']);
		$result = $this->db->get('siswa')->row_array();
		if($result)
		{
			$this->session->set_userdata('usr_login', $result['nis']);
			return true;
		}else{
			return false;
		}
	}
}
?>