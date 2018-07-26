<?php

    class Admin_model extends CI_Model
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
        }
        
        public function select_all_admin()
        {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('level', '1');
            
            return $this->db->get();
        }
        public function add_admin($data)
		{
			$this->db->insert('user', $data);
			return $this->db->insert_id();
		}
        public function add_petugas($data)
		{
			$this->db->insert('user', $data);
			return $this->db->insert_id();
		}

		public function select_by_id($id)
		{
			$this->db->from('user');
			$this->db->where('uid', $id);
			$query = $this->db->get();

			return $query->row();
		}

		public function delete_by_id($id)
		{
			$this->db->where('uid', $id);
			$this->db->delete('user');
		}

		public function update_data($where, $data)
		{
			$this->db->update('user', $data, $where);
			return $this->db->affected_rows();
		}
        
        public function select_all_petugas()
        {
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('level', '2');
            
            return $this->db->get();
        }
		
		public function new_user_admin()
		{
			$this->db->select('*');
            $this->db->where('level', '1');
			$this->db->order_by('uid', 'DESC');
            
            return $this->db->get('user', 5);
		}
		
		public function new_user_petugas()
		{
			$this->db->select('*');
            $this->db->where('level', '2');
			$this->db->order_by('uid', 'DESC');
            
            return $this->db->get('user', 5);
		}
    }