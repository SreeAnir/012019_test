<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	/**
	 * Login Page for this controller.
	 *
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
 	 */

	public function login()
	{ 
		$this->output->delete_cache();

		$data = array('content'=>'user/login');
		$this->load->view('auth_template',$data);
		//$this->load->view('user/login');
	}
	public function register()
	{
		$this->load->view('user/register');
	}
	 public function authenticate(){
	 	var_dump($_POST);
	 	$this->load->view('user/register');
	 }
}
