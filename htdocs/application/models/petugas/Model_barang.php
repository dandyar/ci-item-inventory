<?php
    
    class Model_barang extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();

        }
        
        public function select_all()
        {
            $this->db->select('*');
            $this->db->from('barang');
            
            return $this->db->get();
        }
        
        public function select_items(){
            $this->db->select('nama, kd_barang');
            $this->db->from('barang');
            
            return $this->db->get();
            
        }
    }