<?php

class Model_siswa_dashboard extends CI_Model
{
	
	function info_siswa()
	{
		$nis = $this->session->userdata('usr_login');
		$this->db->where('nis', $nis);
		return $this->db->get('siswa');
	}
}
?>