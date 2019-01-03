<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Interest extends CI_Controller
{

/**
 * Login Page for this controller.
 *
 * Since this controller is set as the default controller in
 * config/routes.php, it's displayed at http://example.com/
 */
    public function __construct()
    {
       
        parent::__construct();
        $this->load->Model('AuthModel');
        $this->load->Model('InterestModel');
        $user = $this->AuthModel->getUser();
        if(!$user){
            $response=array();
            $response['status'] = 0;
            $response['message'] = "No  user session";
            echo json_encode($response); 
            exit;
        } 
        
    }

    public function add_interest()
    {
        $response = array();
        $response['status'] = 0;
        $response['message'] = 0;
        try {
            $interest = $_POST['keyword'];
            if ($interest == "") {
                $response['status'] = 0;
                $response['message'] = "No Keyword added";
                echo json_encode($response);
            } else {
                $user_id = $this->AuthModel->getUser('id');
                $save_data = array(
                    'user_id' => $user_id,
                    'keyword' => $interest,
                );
                $result = $this->InterestModel->save_interest($save_data);
                if ($result) {
                    $response['status'] = 1;
                    $response['message'] = "Sucessfully Added";
                } else {
                    $response['status'] = 0;
                    $response['message'] = "Faile to Add";
                    echo json_encode($response);
                }
                echo json_encode($response);

            }
        } catch (Exception $e) {
            echo $e->getMessage();die();
            return false;
        }
    }
}
