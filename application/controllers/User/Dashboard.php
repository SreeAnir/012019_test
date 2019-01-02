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
}

 
public function home()
{
 $data = array('content' => 'dashboard/home', 'title' => 'Login Now');
   $this->load->view('dashboard_template', $data);
}
}
