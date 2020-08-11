<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('url_helper');
        $this->load->helper('url');
        $this->load->library("pagination");
    }

    public function index() {
        // var_dump('expression');exit;
    	$global['nav'] = 'message';
        $config = array();
        $config["base_url"] = base_url() . "admin/message";
        $config["total_rows"] = $this->Admin_model->get_count('contact');
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;

    //////////////////////////////////////
    

        //////////////////////////////////

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3)-1 : 0;

        $global["links"] = $this->pagination->create_links();
        $search = $this->input->post('search');
        $global['message'] = $this->Admin_model->get_message($config["per_page"], $page,$search);
        $global['search'] = $search;
        $this->Bloadview('backend/message', $global);
    }
	
	public function getData()
	{
		$getdata = $this->Admin_model->get('contact');
		$index = 0;

		foreach ($getdata as $key => $value) {
			$index++;
			$getdata[$key]['index'] = $index;
		}
		$tabledata['data'] = $getdata;
		echo json_encode($tabledata);
	}

    public function delete_message()
    {
        $ids=$this->input->post('ids');
        $id_array = explode(',', $ids);
        foreach ($id_array as $key => $value) {
            $this->Admin_model->delete('contact',$value);
        }
        return redirect('admin/message');
    }
	
}