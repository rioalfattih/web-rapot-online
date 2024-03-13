<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login	 extends CI_Controller {

	function __construct() {
    	parent::__construct();
    	$this->load->model('Model_login');
    }

    function index()
    {
    	$this->load->view('login');
    }

    function cek_login()
    {
    	if(!empty($_POST['submit']))
    	{
    		$opsi = $this->input->post('opsi');
    		$data = array(
    			'username' => $this->input->post('username'),
    			'password' => MD5($this->input->post('password'))
    		);
    		if($opsi=="admin")
    		{
    			$result = $this->Model_login->cek_admin($data);
    		}else{
    			$result = $this->Model_login->cek_siswa($data);
    		}
    		if($result)
    		{
                if($opsi=="admin")
                {
                    redirect('adm_dashboard');
                }else{
                    redirect('dashboard');
                }
    			
    		}else{
    			$this->session->set_flashdata(array('config' => 'danger', 'pesan' => 'Login gagal, silakan cek username dan password anda!'));
    			redirect("login");
    		}
    	}else{
    		redirect("login");
    	}
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}
?>