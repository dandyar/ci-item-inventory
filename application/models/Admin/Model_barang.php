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
        
        public function tambah_barang($data)
		{
			$this->db->insert('barang', $data);
			return $this->db->insert_id();
		}

		public function select_by_id($id)
		{
			$this->db->from('barang');
			$this->db->where('kd_barang', $id);
			$query = $this->db->get();

			return $query->row();
		}

		public function delete_by_id($id)
		{
			$this->db->where('kd_barang', $id);
			$this->db->delete('barang');
		}

		public function update_data($where, $data)
		{
			$this->db->update('barang', $data, $where);
			return $this->db->affected_rows();
		}
    }