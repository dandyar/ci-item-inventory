<?php

    class Model_peminjaman extends CI_Model
    {
        
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function select_all()
        {
            $this->db->select('*');
            $this->db->from('data_peminjam');
            $this->db->where('status', 'Active');
            
            return $this->db->get();
        }

        public function daftar_pengembalian()
        {
            $this->db->select('*');
            $this->db->from('data_peminjam');
            
            return $this->db->get();
        }

        public function select_all2()
        {
            $this->db->select('*');
            $this->db->from('data_peminjam');
            $this->db->where('status', 'SELESAI');
            
            return $this->db->get();
        }
        
        public function select_by_id($id){
            $this->db->select('*');
            $this->db->from('data_peminjam');
            $this->db->where('id', $id);
            
            return $this->db->get();
        }
        
        public function barang_peminjam($id)
        {
            $this->db->select('*');
            $this->db->from('barang_peminjam');
            $this->db->where('kode', $id);
            
            return $this->db->get();
        }
        public function barang_pengembalian($id)
        {
            $this->db->select('*');
            $this->db->from('pengembalian');
            $this->db->where('kode', $id);
            
            return $this->db->get();
        }
        
        public function insert($peminjam, $table)
        {
            $this->db->insert($table, $peminjam);
        }
        
        public function insert_items($result, $table)
        {
            $this->db->insert_batch($table, $result);
        }
        
        public function laporan_terbaru(){
            $this->db->select('id, nama, tgl_pinjam, tgl_kembali');
            $this->db->order_by('id', 'DESC');
            
            return $this->db->get('data_peminjam', 7);
        }
        
        public function form_pengembalian($id)
        {
            $this->db->from('barang_peminjam');
			$this->db->where('kd_barang', $id);
			$query = $this->db->get();

			return $query->row();
        }

        public function pinjam_selesai($data, $id)
        {
            $this->db->where('id', $id);
            $this->db->update('data_peminjam',$data);
        }
        
    }