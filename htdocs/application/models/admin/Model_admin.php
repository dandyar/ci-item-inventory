<?php

    class Model_admin extends CI_Model
    {
        public function select_all()
        {
            $this->db->select('*');
            $this->db->from('data_peminjam');
            $this->db->where('status', 'Active');
            
            return $this->db->get();
        }
        public function select_all2()
        {
            $this->db->select('*');
            $this->db->from('data_peminjam');
            $this->db->where('status', 'SELESAI');
            
            return $this->db->get();
        }
        public function delete_by_id($kode)
        {
            $this->db->where('id', $kode);
            $this->db->delete('data_peminjam');
        }
        
        public function delete_items($kode)
        {
            $this->db->where('kode', $kode);
            $this->db->delete('barang_peminjam');
        }
    }