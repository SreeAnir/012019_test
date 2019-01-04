<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
  $user = $this->AuthModel->getUser();
        if(!$user){
            redirect('/login'); 
            exit;
   } 
}

 
public function home()
{
	$user = $this->AuthModel->getUser();
 $data = array('content' => 'dashboard/home', 'title' => 'Login Now','user'=>$user);
   $this->load->view('dashboard_template', $data);
}
}
