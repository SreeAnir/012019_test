<?php
class InterestModel extends CI_Model {

        public $keyword;
      
        public function save_interest($data)
        {
                $this->db->insert('interest',$data);
                return ($this->db->affected_rows() != 1) ? false : true;
        }

}