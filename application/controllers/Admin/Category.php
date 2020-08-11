<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('url_helper');
    }

	public function index()
	{
		$global['nav'] = 'category';
		
		$this->Bloadview('backend/category', $global);
	}
	public function getData()
	{
		$getdata = $this->Admin_model->get('category');
		$index = 0;

		foreach ($getdata as $key => $value) {
			$index++;
			$getdata[$key]['index'] = $index;
		}
		$tabledata['data'] = $getdata;
		echo json_encode($tabledata);
	}
	public function edit_category()
	{
		
		$data = array();
		if(isset($_FILES["picture"])){
			$target_dir = "/uploads/category/";
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
			  $data['image'] = $target_file;
			}
		}
		$data['title'] = $this->input->post('title');
		$data['type'] = $this->input->post('type');
		if($this->input->post('id') == '')
			$this->Admin_model->add('category',$data);
		else{
			
			$this->Admin_model->update('category',$this->input->post('id'),$data);
		}
		return redirect('admin/category');
	}

	function delete_category()
	{
		$id = $this->input->post('id');
		if($id != ''){
			$this->Admin_model->delete('category',$id);
		}
		return redirect('admin/category');
	}
}