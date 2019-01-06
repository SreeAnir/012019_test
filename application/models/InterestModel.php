<?php
class InterestModel extends CI_Model {

        public $keyword;
      
        public function save_interest($data)
        {

        		if(isset($data['id'])){
        		$this->db->where('id', $data['id']);
    			$this->db->update('interest',$data);
        		}else{
                $this->db->insert('interest',$data);
                }
                return ($this->db->affected_rows() != 1) ? false : true;
        }
        public function record_count($data){
            if(isset($data['search'])){
                $this->db->like('keyword', $data['search']);
                unset($data['search']);
            }
			$this->db->where($data);
			$num_rows = $this->db->count_all_results('interest');
			return ($num_rows);
        }
         public function get_interest_for_user($data,$limit, $page)
        { 
            if(isset($data['search'])){
                $this->db->like('keyword', $data['search']);
                unset($data['search']);
            }
        	$dataRes=array();
        	$offset=($page-1)*$limit;
			$this->db->limit($limit,$offset);
			$this->db->where($data);
			$query = $this->db->get("interest"); 
			if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
			$dataRes[] = $row;
			}
			return $dataRes;
			}
			return false;
        }

}