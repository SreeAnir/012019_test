<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cms extends CI_Controller
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
          $this->load->helper('url');

  $this->load->Model('AuthModel');
   $this->load->Model('AdminModel');
   $this->load->Model('InterestModel');
  $sessio = $this->AuthModel->checkAdminAuth();
  if(!$sessio){
      redirect('/admin/login'); 
             $this->redirectLogin();
            exit;
   } 
  $this->load->library('pagination');
}

  
public function home()
{
 $data = array('content' => 'admin/home', 'title' => 'Admin Dashboard');
   $this->load->view('layout/cms', $data);
}

public function userlist()
    {
            $data = array('content' => 'admin/userlist', 'title' => 'Admin Dashboard');
            $config = array();
            $config["base_url"] =base_url()."admin/userlist/";
            $data_search=array();
            $total_row = $this->AdminModel->record_count($data_search);
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
            $data["results"] = $this->AdminModel->list_users($data_search,$config["per_page"], $page);
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );

            // View data according to array.
            $this->load->view('layout/cms', $data);

    }
    function change_status(){
      $response=array();
      $response['status'] = 0;
      $response['message'] = "Sucessfully Added";
      if(isset($_POST)){
        if(isset($_POST['id']) && isset($_POST['status'])){
          $save= $this->AdminModel->change_status_user($_POST['status'],$_POST['id']);
          if($save){
          $response['status'] = 1;
          $response['message'] = "Sucessfully Added";
          }
        }else{
          $response['status'] = 0;
          $response['message'] = "Failed to change";
        }
      }
       echo json_encode($response);
    }
    function user_details($id='0'){
     $data = array('content' => 'admin/user_details', 'title' => 'User Details');
     if($id=='0'){
       $data['results']=array();
     }else{
      $id=base64_decode($id);
      $data['results']=$this->AdminModel->get_user_details($id);
     // $data['keywords']=$this->AdminModel->get_user_interest($id);
     }
    $this->load->view('layout/cms', $data);
    }
    
    public function user_interest()
    {

            $config = array();
            $config["base_url"] =base_url()."user_interest/list/";
            $user_id=-1;
            $page = 1;
            $data_search=array('status'=>1);
            if(isset($_POST['user_id'])){
              $user_id=$_POST['user_id'];
              $data_search['user_id']=$user_id;
            }
            if(isset($_POST['page_id'])){
              $page=$_POST['page_id'];
            }
             if(isset($_POST['search'])){
              $data_search['search']=$_POST['search'];
            }
            
            $total_row = $this->InterestModel->record_count($data_search);
            $config["total_rows"] = $total_row;
            $config["per_page"] = 10;
            $config['use_page_numbers'] = TRUE;
            $config['num_links'] = $total_row;
            $config['cur_tag_open'] = '&nbsp;<a class="current">';
            $config['cur_tag_close'] = '</a>';
            $config['next_link'] = 'Next';
            $config['prev_link'] = 'Previous';
            $this->pagination->initialize($config);
            // if($this->uri->segment(3)){ 
            // $page = ($this->uri->segment(3)) ;
            // }
             
            $data["results"] = $this->InterestModel->get_interest_for_user($data_search,$config["per_page"], $page);
            $str_links = $this->pagination->create_links();
            $data["links"] = explode('&nbsp;',$str_links );

            // View data according to array.
        $this->load->view('admin/interest_list',$data);
    }
}
