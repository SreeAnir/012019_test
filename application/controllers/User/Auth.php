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

    public function login()
    {
        $data = array('content' => 'user/login','title' => 'Login Now');
        $this->load->view('auth_template', $data);
    }
    public function register()
    {  
        $data = array('content' => 'user/register','title' => 'Register Now');
        $this->load->view('auth_template', $data);
    }
    public function authenticate()
    {
        var_dump($_POST);
        $this->load->view('user/register');
    }
}
