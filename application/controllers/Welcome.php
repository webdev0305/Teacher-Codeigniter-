<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('url_helper');
    }

	public function index()
	{
		$global['data'] = $this->Admin_model->get('settings','1');
		$global['shortcut'] = $this->Admin_model->get('shortcuts');
		$this->loadview('frontend/index',$global);
	}

	public function virtual_class()
	{
		$global['data'] = $this->Admin_model->get('settings','1');
		$this->loadview('frontend/virtual_class',$global);
	}

	public function category_page($main_cate)
	{
		
		$global['category'] = $this->Admin_model->getData('category',array('type'=>$main_cate));
		$global['main_cate'] = $main_cate;
		$this->loadview('frontend/category',$global);
	}

	public function files($main_cate,$category_id)
	{
		switch ($main_cate) {
		  case '1':
		    $m = 'video';
		    break;
		  case '2':
		    $m = 'audio';
		    break;
		  case '3':
		    $m = 'books';
		    break;
		  default:
		    $m = 'video';
		}
		$global['files'] = $this->Admin_model->getData('files',array('main_cate'=>$m,'category_id'=>$category_id));

		$global['category'] = $this->Admin_model->get('category',$category_id)['title'];

		$this->loadview('frontend/files',$global);
	}

  
	public function mail(){
		// Check for empty fields
		if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		  http_response_code(500);
		  exit();
		}

		$name = strip_tags(htmlspecialchars($_POST['name']));
		$email = strip_tags(htmlspecialchars($_POST['email']));
		//$phone = strip_tags(htmlspecialchars($_POST['phone']));
		$message = strip_tags(htmlspecialchars($_POST['message']));

		// database insert part
		$data['name'] = $name;
		$data['email'] = $email;
		//$data['phone'] = $phone;
		$data['content'] = $message;
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->Admin_model->add('contact',$data);


		// Create the email and send the message
		$to = "yourname@yourdomain.com"; // Add your email address inbetween the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
		$subject = "Website Contact Form:  $name";
		$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
		$header = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
		$header .= "Reply-To: $email";	

		//if(!mail($to, $subject, $body, $header))
		//  http_response_code(500);
	}
	// public function video_play(){
	// 	$global['file_url'] = '/uploads/media/1596807815mov_bbb.mp4';
	// 	return $this->load->view('frontend/video_play',$global);
	// }

}
