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
		  

		   $user_data=$this->db->select('id,first_name,last_name,email')->get_where('users', array(
		  'email'     => $email,
		  'password'         =>password_verify($password, $password_h)
		  ))->result();
		   if(empty( $user_data)){
			   return FALSE;
		   }
		 return  $user_data;
        }
        public function insert_data($data)
        {
                $this->db->insert('users',$data);
                return ($this->db->affected_rows() != 1) ? false : true;
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

}