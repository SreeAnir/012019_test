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
  		  

  		   $user_data=$this->db->select('id,first_name,last_name,email,gender,locale,location,modified')->get_where('users', array(
  		  'email'     => $email,
  		  'password'    =>password_verify($password, $password_h)
  		  ))->result();
  		   if(empty( $user_data)){
  			   return FALSE;
  		   }

         $user_data=$this->updatelcoation($_POST,$user_data[0]->id);   
           
  		 return  $user_data;
          }

        public function fb_authCheck($data){ 
        $oauth_uid = $data['id'];
         $user_data=$this->db->select('*')->get_where('users', array(
        'oauth_uid'     => $oauth_uid,
        ))->result();

         if(empty( $user_data)){
           //insert
          $insert_data=array();
          if(isset($data['email'])){
            $insert_data['email']=$data['email'];
          }
          $insert_data['oauth_provider']='facebook';
          if(isset($data['gender'])){
            $insert_data['gender']=$data['gender'];
          }
           $insert_data['oauth_uid']=$oauth_uid;
           $data['name']=explode(' ', $data['name']);
           $insert_data['first_name']=$data['name'][0];
           if(count($data['name'])>1){
            $insert_data['last_name']=$data['name'][1];
           }
           $insert=$this->insert_data($insert_data);
           if(!$insert){
            return FALSE;
           }
         } else{
        $insert=$user_data[0]->id;
         }
         $user_data=$this->updatelcoation($data,$insert);   
          return  $user_data;
       
    }
    public  function updatelcoation($post,$user_id)
    {
      # code...
      if(isset($post['clat']) && isset($post['clng'])){
              if( $post['clat']!="" && $post['clng']!=""){ 
              if(isset($user_id)){
              $locale=$post['clat'].','.$post['clng'];
              $this->db->where('id',$user_id);
              $date = date('Y-m-d H:i:s');
              $address=$this->geolocationaddress($post['clat'],$post['clng']);  
              $this->db->update('users',array(
                'locale'=>$locale,
                'modified'=>$date,
                'location'=>$address));
                  }
               }
             }
             $user_data=$this->db->select('id,first_name,last_name,email,location,gender,locale,modified')->get_where('users', array(
        'id'     => $user_id,
           ))->result();
             return $user_data;
    }
  /**
   * find address using lat long
   */
  public static function geolocationaddress($lat, $long)
  {
      $geocode = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&sensor=false&key=AIzaSyCJyDp4TLGUigRfo4YN46dXcWOPRqLD0gQ";
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $geocode);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      $response = curl_exec($ch);
      curl_close($ch);
      $output = json_decode($response);
      $dataarray = get_object_vars($output);
      if ($dataarray['status'] != 'ZERO_RESULTS' && $dataarray['status'] != 'INVALID_REQUEST') {
          if (isset($dataarray['results'][0]->formatted_address)) {

              $address = $dataarray['results'][0]->formatted_address;

          } else {
              $address = 'Not Found';

          }
      } else {
          $address = 'Not Found';
      }

      return $address;
  }
  		
          public function insert_data($data)
          {
                  $this->db->insert('users',$data);
                  return ($this->db->affected_rows() != 1) ? false : $this->db->insert_id();
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
          //Admin
           public function authenticateAdmin($data){ 
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $password_h = password_hash($this->input->post('email'), PASSWORD_DEFAULT);

            $user_data=$this->db->select('*')->get_where('admin', array(
            'username'     => $email,
            'password'    =>password_verify($password, $password_h)
            ))->result();

             if(empty( $user_data)){
                 return FALSE;
             }
           return  $user_data;
          }
           public function checkAdminAuth($value='')
          {
              # code...
               $user_data=$this->session->userdata('admin_session');
               if($user_data==""){
                  return false;
               }
               return true;

          }

  }