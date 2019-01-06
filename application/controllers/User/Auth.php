	<?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Auth extends CI_Controller
	{

	/**
	* Login Page for this controller.
	*
	* Since this controller is set as the default controller in
	* config/routes.php, it's displayed at http://example.com/
	*/
	function __construct()
	{
	parent:: __construct();
	$this->load->Model('AuthModel');
	$this->load->helper(array('form', 'url'));

	}

	public function facebook_auth(){
	$response=array();
	$response['status']=0;
	$response['message']="Failed to Login";	
	if($_POST['response']['id']!=""){
		$data=array();
		$data=$_POST['response'];
		$checking=$this->AuthModel->fb_authCheck($data);
		if(!$checking){
		$response['status']=0;
		$response['message']="Error";
		}else{
		$sess_array=array();
	  foreach($checking as $row)
	 	{
	    $this->session->set_userdata('logged_in', $row); 
		 }
			
		$response['status']=1;
		$response['message']="Success";
		 }
	  }

	echo json_encode($response);

	}
	public function login()
	{
	$this->session->unset_userdata('logged_in');
	$data = array('content' => 'user/login', 'title' => 'Login Now');
	if ($this->input->server('REQUEST_METHOD') == 'GET'){
	$this->load->view('layout\auth_template', $data);
	}else{

	  $this->form_validation->set_rules('email', 'Email', 'trim|required');
	  $this->form_validation->set_rules('password', 'Password', 'trim|required');

	  if ($this->form_validation->run() == FALSE) { 
		$data = array('content' => 'user/login', 'title' => 'Register Now');
	  $this->load->view('layout\auth_template', $data);
	  } else { 
	  $data_an = array(
	  'username' => $this->input->post('username'),
	  'password' => $this->input->post('password')
	  );
	  $result = $this->AuthModel->authenticate($data_an);
	  if ($result != FALSE) {
	  // Add user data in session
	 $sess_array=array();
	  foreach($result as $row)
	 {
	    $this->session->set_userdata('logged_in', $row); 
		 }
		 $user_data=$this->session->userdata('logged_in');
		if($user_data=="") {
			redirect('/login');
		}
		   redirect('/home');
	  } else {
	  $data['error_message']= 'Invalid Username or Password' ;
	  $this->load->view('layout\auth_template', $data);
	  }
	  }
	}

	}


	public function register()
	{
	if ($this->input->server('REQUEST_METHOD') == 'GET'){


	//its a get

	$data = array('content' => 'user/register', 'title' => 'Register Now');
	  $this->load->view('layout\auth_template', $data);
	}
	//if post
	if ($this->input->server('REQUEST_METHOD') == 'POST'){



	$this->load->library('form_validation');

	$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]|max_length[30]');
	$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|min_length[2]|max_length[30]' );

	$this->form_validation->set_rules('password', 'Password', 'required',
	  array('required' => 'You must provide a %s.')
	);
	$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'trim|required|matches[password]');

	$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
	if ($this->form_validation->run() == false) {
	  //redirect back with fail message
	  $data = array('content' => 'user/register', 'title' => 'Register Now');
	  $this->load->view('layout\auth_template', $data);
	} else {
	 if( ! $this->AuthModel->emailExists($_POST['email'])){
	   $data = array('content' => 'user/register', 'title' => 'Register Now','error_message' =>"Email Already Exists");
	 }else{
	  $data = array('first_name'=>$_POST['firstname'],'email' =>$_POST['email'],'gender' =>$_POST['gender'],
		  'password' =>password_hash($_POST['password'], PASSWORD_DEFAULT)
		  , 'last_name'=>$_POST['lastname']);
			$insert=$this->AuthModel->insert_data($data);
		  if($insert){
			  $this->session->set_flashdata('message', 'Success!!Please Login to Continue');
			  redirect('/login');

		  }else{
			  $data['error_message']="Failed to Register";
		  }
		 

	 }
	$this->load->view('layout\auth_template', $data);
	  //redirect to login page
	}
	}
	}

	}
