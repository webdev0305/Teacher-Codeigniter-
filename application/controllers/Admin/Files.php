<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('url_helper');
    }

	public function videos()
	{
		$global['nav'] = 'video';
		$global['category'] = $this->Admin_model->getData('category',array('type'=>'1'));
		$this->Bloadview('backend/videos', $global);
	}
	public function audios()
	{
		$global['nav'] = 'audio';
		$global['category'] = $this->Admin_model->getData('category',array('type'=>'2'));
		$this->Bloadview('backend/audios', $global);
	}

	public function books()
	{
		$global['nav'] = 'book';
		$global['category'] = $this->Admin_model->getData('category',array('type'=>'3'));
		$this->Bloadview('backend/bookshelfs', $global);
	}
	public function getData()
	{
		$main_cate = $this->input->post('main_cate');
		$getdata = $this->Admin_model->getData('files',array('main_cate'=> $main_cate));
		$index = 0;
		foreach ($getdata as $key => $value) {
			$index++;
			$getdata[$key]['index'] = $index;
		}
		$tabledata['data'] = $getdata;
		echo json_encode($tabledata);
	}
	public function edit_file()
	{
		
		$data = array();
		if(isset($_FILES["file_url"])){
			$target_dir = "/uploads/media/";
			$target_file = $target_dir .time(). basename($_FILES["file_url"]["name"]);
			$uploadOk = 1;
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			// Allow certain file formats
			if($imageFileType != "mp4" && $imageFileType != "mp3" && $imageFileType != "avi"
			&& $imageFileType != "wav" ) {
			 
			  $uploadOk = 0;
			}

			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			  
			// if everything is ok, try to upload file
			} else {
			  move_uploaded_file($_FILES["file_url"]["tmp_name"], '.'.$target_file);
			  $data['file_url'] = $target_file;
			  $data['file_type'] = $imageFileType;
			}
		}
		$data['title'] = $this->input->post('title');
		$link_url = $this->input->post('link_url');
		$link_url = $this->input->post('link_url');
		$link_url = str_replace("http://","",$link_url);
		$link_url = str_replace("https://","",$link_url);
		if($link_url != ''){
			$data['link_url'] = "http://".$link_url;
			$uploadOk = 1;
		}
		else $data['link_url'] = "";
		$data['category_id'] = $this->input->post('category_id');
		$data['main_cate'] = $this->input->post('main_cate');
		if($this->input->post('id') == '' && $uploadOk != 0)
			$this->Admin_model->add('files',$data);
		else{
			
			$this->Admin_model->update('files',$this->input->post('id'),$data);
		}
		if($data['main_cate']=='video')
			return redirect('admin/videos');
		if($data['main_cate']=='audio')
			return redirect('admin/audios');
		if($data['main_cate']=='books')
			return redirect('admin/books');
	}

	function delete_file()
	{
		$id = $this->input->post('id');
		if($id != ''){
			$this->Admin_model->delete('files',$id);
		}
		if($this->input->post('main_cate')=='video')
			return redirect('admin/videos');
		if($this->input->post('main_cate')=='audio')
			return redirect('admin/audios');
		if($this->input->post('main_cate')=='book')
			return redirect('admin/books');
	}
}