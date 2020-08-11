<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index()
	{
		
		$data['nav'] = 'dashboard';
		$this->Bloadview('backend/dashboard',$data);
	}
	public function login()
	{
        $this->load->view('backend/login');
	}

	public function login_admin()
    {

    	$user_name = $this->input->post('user_name');
    	$password = ($this->input->post('password'));
    	$is_admin = $this->Admin_model->getData('settings',array('id'=>'1','user_name'=>$user_name,'password'=>$password));
    	
    	if(count($is_admin)>0){
    		$user_array = ['user_name' => $user_name,
    						'password' => $password,
    						'is_logged_in' => true];
    		$this->session->set_userdata($user_array);
    	}else redirect('login');
    	return redirect('admin');

    }
    public function logout()
    {
    	$this->session->sess_destroy();
    	return redirect('welcome');
    }
    public function change_profile()
    {
    	$data['user_name'] = $this->input->post('user_name');
    	$data['password'] = $this->input->post('password');
    	$update=$this->Admin_model->update('settings','1',$data);
		return redirect('admin');
    }

	

	

}
