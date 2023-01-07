<?php
    
    class Model_pengembalian extends CI_Model
    {
        public function insert_items($result, $table)
        {
            $this->db->insert_batch($table, $result);
        }
    }