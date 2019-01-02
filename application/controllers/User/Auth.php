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
        $data = array('content' => 'user/login', 'title' => 'Login Now');
        $this->load->view('auth_template', $data);
    }
    public function register()
    {
        $data = array('content' => 'user/register', 'title' => 'Register Now');
        $this->load->view('auth_template', $data);

        //if post

        $this->load->helper(array('form', 'url'));

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
            die("Didnt pass");
        } else {
            die("Done");
            //redirect to login page
        }
    }

    public function authenticate()
    {
        var_dump($_POST);
        $this->load->view('user/register');
    }
}
