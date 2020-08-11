<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('url_helper');
    }

	public function index()
	{
		$global['nav'] = 'home';
		$global['data'] = $this->Admin_model->get('settings','1');
		$this->Bloadview('backend/homepage_edit', $global);
	}

	public function edit_homepage(){

		$data = array();
		if(isset($_FILES["teacher_avatar"])){
			$target_dir = "/uploads/avatar/";
			$target_file = $target_dir .time(). basename($_FILES["teacher_avatar"]["name"]);
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
			  move_uploaded_file($_FILES["teacher_avatar"]["tmp_name"], '.'.$target_file);
			  $data['teacher_avatar'] = $target_file;
			}
		}
		$data['title'] = $this->input->post('title');
		$data['about_content'] = $this->input->post('about_content');

		$update=$this->Admin_model->update('settings','1',$data);
		return redirect('admin/home');
	}

	public function virtual()
	{
		$global['nav'] = 'virtual';
		$global['data'] = $this->Admin_model->get('settings','1');
		$this->Bloadview('backend/virtualpage_edit', $global);
	}

	public function edit_virtualpage(){
		$data = array();
		if(isset($_FILES["whiteboard_image"])){
			$target_dir = "/uploads/whiteboard/";
			$target_file = $target_dir .time(). basename($_FILES["whiteboard_image"]["name"]);
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
			  move_uploaded_file($_FILES["whiteboard_image"]["tmp_name"], '.'.$target_file);
			  $data['whiteboard_image'] = $target_file;
			}
		}
		$data['whiteboard_text'] = $this->input->post('whiteboard_text');
		if($this->input->post('whiteboard_type')=='on')
			$data['whiteboard_type'] = 'image';
		else
			$data['whiteboard_type'] = 'text';
		$ipad_link = $this->input->post('ipad_link');
		$calendar_link = $this->input->post('calendar_link');
		$desktop_link = $this->input->post('desktop_link');
		
		$ipad_link=str_replace("http://","",$ipad_link);
		$ipad_link=str_replace("https://","",$ipad_link);
		$data['ipad_link'] = "http://".$ipad_link;
		$calendar_link=str_replace("http://","",$calendar_link);
		$calendar_link=str_replace("https://","",$calendar_link);
		$data['calendar_link'] = "http://".$calendar_link;
		$desktop_link=str_replace("http://","",$desktop_link);
		$desktop_link=str_replace("https://","",$desktop_link);
		$data['desktop_link'] = "http://".$desktop_link;
		$update=$this->Admin_model->update('settings','1',$data);
		return redirect('admin/virtual');
	}

	public function delete_image(){

		
		$data['whiteboard_image'] ='';
		$update=$this->Admin_model->update('settings','1',$data);
		return redirect('admin/virtual');
	}
	

	

}
