<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shortcut extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('url_helper');
    }

	public function index()
	{
		$global['nav'] = 'shortcut';
		
		$this->Bloadview('backend/shortcut_edit', $global);
	}
	public function getData()
	{
		$getdata = $this->Admin_model->get('shortcuts');
		$index = 0;

		foreach ($getdata as $key => $value) {
			$index++;
			$getdata[$key]['index'] = $index;
		}
		$tabledata['data'] = $getdata;
		echo json_encode($tabledata);
	}
	public function edit_shortcut()
	{
		
		$data = array();
		if(isset($_FILES["picture"])){
			$target_dir = "/uploads/shortcut/";
			$target_file = $target_dir .time(). basename($_FILES["picture"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			 
			  $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  
			// if everything is ok, try to upload file
			} else {
			  move_uploaded_file($_FILES["picture"]["tmp_name"], '.'.$target_file);
			  $data['picture'] = $target_file;
			}
		}
		$data['title'] = $this->input->post('title');
		$link_url = $this->input->post('link_url');
		$link_url=str_replace("http://","",$link_url);
		$link_url=str_replace("https://","",$link_url);
		if($link_url!='')
			$data['link_url'] = "http://".$link_url;
		else 
			$data['link_url'] = "";
		$data['description'] = $this->input->post('description');
		
		if($this->input->post('popup')=='on')
			$data['popup'] = 1;
		else
			$data['popup'] = 0;
		if($this->input->post('id') == '')
			$this->Admin_model->add('shortcuts',$data);
		else{
			
			$this->Admin_model->update('shortcuts',$this->input->post('id'),$data);
		}
		return redirect('admin/shortcut');
	}

	function delete_shortcut()
	{
		$id = $this->input->post('id');
		if($id != ''){
			$this->Admin_model->delete('shortcuts',$id);
		}
		return redirect('admin/shortcut');
	}
}