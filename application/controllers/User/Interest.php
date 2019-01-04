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
        $this->load->library('pagination');
    }

    public function add_interest()
    {
        $response = array();
        $response['status'] = 0;
        $response['message'] = 0;
        try {
            $user_id = $this->AuthModel->getUser('id');
            
            if ($user_id=="" ) {
                $response['status'] = 0;
                $response['message'] = "No User Id";
                echo json_encode($response);
            } else {
                
                $save_data = array(
                    'user_id' => $user_id,
                );
                if(isset( $_POST['id'])){
                  $save_data['id']  = $_POST['id'];
                }
                if(isset( $_POST['keyword'])){
                  $save_data['keyword']  = $_POST['keyword'];
                }
                if(isset( $_POST['status'])){
                  $save_data['status']  = $_POST['status'];
                }
                $result = $this->InterestModel->save_interest($save_data);
                if ($result) {
                    $response['status'] = 1;
                    $response['message'] = "Sucessfully Added";
                } else {
                    $response['status'] = 0;
                    $response['message'] = "Faile to Add";
                }
                echo json_encode($response);

            }
        } catch (Exception $e) {
            echo $e->getMessage();die();
            return false;
        }
    }

    public function list_interest()
    {
            $user_id = $this->AuthModel->getUser('id');
            $config = array();
            $config["base_url"] ="interest/list";
            $data_search=array('user_id'=>$user_id,'status'=>1);
            $total_row = $this->InterestModel->record_count($data_search);
            $config["total_rows"] = $total_row;
            $config["per_page"] = 5;
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';
            $this->pagination->initialize($config);
            if($this->uri->segment(3)){ 
            $page = ($this->uri->segment(3)) ;
            }
            else{
            $page = 1;
            }
            $data["results"] = $this->InterestModel->get_interest_for_user($data_search,$config["per_page"], $page);
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );

            // View data according to array.
        $this->load->view('dashboard/interest_list',$data);
    }
}
