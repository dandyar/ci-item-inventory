<?php

    class Login_model extends CI_Model
    {
        public function auth($data)
        {
            $query = $this->db->get_where('user', $data);
            return $query;
        }
    }