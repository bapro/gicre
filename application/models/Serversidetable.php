<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Serversidetable extends CI_Model{
 protected $table = 'rendez_vous';
    function __construct() {

    }

    public function get_count() {
            return $this->db->count_all($this->table);
        }

        public function get_authors($limit, $start) {
            $this->db->limit($limit, $start);
          //  $this->db->where('centro', 4);
              $this->db->where('doctor', 274);
            $query = $this->db->get($this->table);

            return $query->result();
        }

}
