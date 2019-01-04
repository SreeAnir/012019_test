<?php
class AuthModel extends CI_Model {

        public $title;
        public $content;
        public $date;

        public function emailExists($email)
        {
            $email_count=  $this->db->get_where('users', array('email =' => $email))->num_rows();
            if($email_count>0){
                return false;
            }else{
                return true;
            }
        }
        public function authenticate($data){ 
		  $email = $this->input->post('email');
		  $password = $this->input->post('password');
		  $password_h = password_hash($this->input->post('email'), PASSWORD_DEFAULT);
		  

		   $user_data=$this->db->select('id,first_name,last_name,email,gender,locale,modified')->get_where('users', array(
		  'email'     => $email,
		  'password'    =>password_verify($password, $password_h)
		  ))->result();
		   if(empty( $user_data)){
			   return FALSE;
		   }
           if(isset($_POST['clat']) && isset($_POST['clng'])){
             if( $_POST['clat']!="" && $_POST['clng']!=""){ 
                 if(isset($user_data[0]->id)){
                $locale=$_POST['clat'].','.$_POST['clng'];
                $this->db->where('id', $user_data[0]->id);
                $this->db->update('users',array('locale'=>$locale));
                }
             }
           }
         
		 return  $user_data;
        }
        public function insert_data($data)
        {
                $this->db->insert('users',$data);
                return ($this->db->affected_rows() != 1) ? false : true;
        }

       
        public function getUser($key="")
        {
             
            try{
                $user_data=$this->session->userdata('logged_in');

               
                if($user_data==null){
                    return false;
                }
                if($key!=""){ 
                    return ($user_data->$key);
                }
                else{
                    return $user_data;
                }
            } catch (Exception $e) {
                return false;   
            }
            
        }

}