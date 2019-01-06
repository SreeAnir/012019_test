<?php
class AdminModel extends CI_Model {

        public $keyword;
      
        public function record_count($data_where){
			$this->db->where($data_where);
			$num_rows = $this->db->count_all_results('users');
			return ($num_rows);
        }
         public function list_users($data,$limit, $page)
        { 
        	$dataRes=array();
        	$offset=($page-1)*$limit;
			$this->db->limit($limit,$offset);
			$this->db->where($data);
			$query = $this->db->get("users");
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$dataRes[] = $row;
			}
			return $dataRes;
			}
			return false;
        }
        public function get_user_interest($id=0){
                $this->db->from('users');
                $this->db->where('users.id', $id);
                $this->db->join('interest', 'interest.user_id = users.id', 'inner');
                $query = $this->db->get();  
                if ($query->num_rows() > 0) {
                return $query->result();
                }
            return false;
        }
        public function get_user_details($id=0){
                $this->db->where(array('id' => $id));
                $query = $this->db->get("users");
                if ($query->num_rows() > 0) {
                return $query->result();
                }
            return false;
        }
         public function change_status_user($status,$user_id)
        {
            # code...

                $this->db->where('id', $user_id);
                $this->db->update('users',array('status' =>$status) );
                return ($this->db->affected_rows() != 1) ? false : true;
        }

}