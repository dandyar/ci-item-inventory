<?php

    class Login extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->library('session');
            $this->load->helper('url');
        }
        
        public function index($page = 'login')
        {
            $data = array(
                'title' => ucfirst($page),
                'style_css' => 'login.css'
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('login_page');
            $this->load->view('templates/footer');
        }
        
        public function auth()
        {
            $this->load->model('Login_model');
            
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'password' => md5($this->input->post('password', TRUE))
            );
            
            $hasil = $this->Login_model->auth($data);
            
            if($hasil->num_rows() == 1)
            {
                foreach($hasil->result() as $sess)
                {
                    $sess_data['logged_in'] = "ONLINE";
                    $sess_data['uid'] = $sess->uid;
                    $sess_data['name'] = $sess->name;
                    $sess_data['username'] = $sess->username;
                    $sess_data['level'] = $sess->level;
                    $this->session->set_userdata($sess_data);
                }
                if($this->session->userdata('level') == '1')
                {
                    redirect('admin');
                }
                elseif($this->session->userdata('level') == '2')
                {
                    redirect('petugas');
                }
            }
            else
            {
                redirect('login');
            }
        }
    }