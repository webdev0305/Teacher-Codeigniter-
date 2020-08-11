<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	 function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Admin_model');
    }
    private function islogged_in()
    {
    	if(($this->session->userdata('is_logged_in')!=null) && ($this->session->userdata('is_logged_in')==true))
    		return true;
    	else return false;
    }

    

	public function loadview($content,$data)
	{
		$this->load->view('layout/header', $data);
        $this->load->view($content, $data);
        $this->load->view('layout/footer', $data);
	}

	public function Bloadview($content,$data)
	{
		if($this->islogged_in()==true){
			
			$this->load->view('layout/admin_header', $data);
	        $this->load->view($content, $data);
	        $this->load->view('layout/admin_footer',$data);
		}else return redirect('login');
		
	}


}
?>