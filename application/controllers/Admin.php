<?php

    class Admin extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->library('session');
            if($this->session->userdata('username') == ""){
                redirect('login');
            }
            elseif($this->session->userdata('level') !== "1")
            {
                redirect('petugas');
            }
        }
        
        public function index($page = 'Halaman Admin')
        {
            $this->load->model('Admin_model');
			
            $data = array(
                'user' => $this->session->userdata('username'),
                'title' => $page,
                'style_css' => 'admin.css',
				'new_user_admin' => $this->Admin_model->new_user_admin()->result(),
				'new_user_petugas' => $this->Admin_model->new_user_petugas()->result()
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/home');
            $this->load->view('templates/footer');
        }
        
        public function data_admin($page = 'Halaman Admin')
        {
            $this->load->model('Admin_model');
            
            $data = array(
                'user' => $this->session->userdata('username'),
                'title' => $page."- Data Admin",
                'style_css' => 'admin.css',
                'data_admin' => $this->Admin_model->select_all_admin()->result()
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/data_admin');
            $this->load->view('templates/footer');
            
        }
        
         public function select_by_id($id)
		{
            $this->load->model('Admin_model');
            
			$data = $this->Admin_model->select_by_id($id);

			echo json_encode($data);
		}
        
        public function add_admin()
		{
            
            $this->load->model('Admin_model');
            
			$data = array(
				'uid' => $this->input->post('id'),
				'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
                'level' => '1'
			);

			$insert = $this->Admin_model->add_admin($data);
			echo json_encode(array("status" => TRUE));
		}

		public function hapus_data($id)
		{
            $this->load->model('Admin_model');
            
			$this->Admin_model->delete_by_id($id);
			echo json_encode(array("status" => TRUE));
		}

		public function update_data()
		{
            $this->load->model('Admin_model');
            
			$data = array(
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
                'password' => md5($this->input->post('stok'))
			);

			$this->Admin_model->update_data(array('uid' => $this->input->post('id')), $data);
			echo json_encode(array("status" => TRUE));
		}
        
        public function data_petugas($page = 'Halaman Admin')
        {
            $this->load->model('Admin_model');
            
            $data = array(
                'user' => $this->session->userdata('username'),
                'title' => $page."- Data Petugas",
                'style_css' => 'admin.css',
                'data_petugas' => $this->Admin_model->select_all_petugas()->result()
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/data_petugas', $data);
            $this->load->view('templates/footer');
            
        }
        public function add_petugas()
		{
            
            $this->load->model('Admin_model');
            
			$data = array(
				'uid' => $this->input->post('id'),
				'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
                'level' => '2'
			);

			$insert = $this->Admin_model->add_petugas($data);
			echo json_encode(array("status" => TRUE));
		}
        
        public function db_backup()
		{
			$this->load->dbutil();

			$prefs = array(
				'format' => 'zip',
				'filename' => 'db_backup.sql'
			);

			$backup =& $this->dbutil->backup($prefs);

			$db_name = 'backup-'.date("Y-m-d-H-i-s").'.zip';
			$save = 'pathtobkfolder/'.$db_name;

			$this->load->helper('file');
			write_file($save, $backup);

			$this->load->helper('download');
			force_download($db_name, $backup);
		}
        
        public function logout()
        {
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('uid');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('password');
            
            redirect('login');
        }
		
		public function barang($page = 'Halaman Admin ')
        {
            $this->load->model('admin/Model_barang');
            
            $data = array(
                'user' => $this->session->userdata('username'),
                'title' => $page."- Data Barang",
                'style_css' => 'petugas.css',
                'data_barang' => $this->Model_barang->select_all()->result()
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/data_barang');
            $this->load->view('templates/footer');
        }
		
		public function get_by_id($id)
		{
			$this->load->model('admin/Model_barang');
			$data = $this->Model_barang->select_by_id($id);

			echo json_encode($data);
		}
        
        public function tambah_barang()
		{
			$this->load->model('admin/Model_barang');
			$data = array(
				'kd_barang' => $this->input->post('id'),
				'nama' => $this->input->post('barang'),
				'kategori' => $this->input->post('kategori'),
				'stok' => $this->input->post('stok')
			);

			$insert = $this->Model_barang->tambah_barang($data);
			echo json_encode(array("status" => TRUE));
		}

		public function hapus_barang($id)
		{
            $this->load->model('admin/Model_barang');
			$this->Model_barang->delete_by_id($id);
			echo json_encode(array("status" => TRUE));
		}

		public function update_barang()
		{
            $this->load->model('admin/Model_barang');
			$data = array(
				'nama' => $this->input->post('barang'),
				'kategori' => $this->input->post('kategori'),
                'stok' => $this->input->post('stok')
			);

			$this->Model_barang->update_data(array('kd_barang' => $this->input->post('id')), $data);
			echo json_encode(array("status" => TRUE));
		}
		
		public function laporan($page = 'Halaman Admin')
        {
            $this->load->model('admin/Model_Admin');
            
            $data = array(
                'user' => $this->session->userdata('username'),
                'title' => $page."- Laporan",
                'style_css' => 'admin.css',
                'laporan' => $this->Model_Admin->select_all()->result(),
                'laporan2' => $this->Model_Admin->select_all2()->result()
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/laporan_view');
            $this->load->view('templates/footer');
        }
		public function hapus_laporan($kode)
        {
            $this->load->model('admin/Model_Admin');
            $this->Model_Admin->delete_by_id($kode);
            $this->Model_Admin->delete_items($kode);
            
            
            echo json_encode(array("status" => TRUE));
        }
		
		public function pdf($id)
		{
			$this->load->library('PdfGenerator');
            $this->load->model('petugas/Model_peminjaman');

			$data = array(
                'data_peminjam' => $this->Model_peminjaman->select_by_id($id)->row(),
                'barang_peminjam' => $this->Model_peminjaman->barang_peminjam($id)->result()
			);

			$html = $this->load->view('petugas/surat_peminjaman', $data, TRUE);

			$this->pdfgenerator->generate($html, 'Surat_Peminjaman');
		}

        public function cetakpdf($id)
        {
            $this->load->library('PdfGenerator');
            $this->load->model('petugas/Model_peminjaman');

            $data = array(
                'data_peminjam' => $this->Model_peminjaman->select_by_id($id)->row(),
                'barang_peminjam' => $this->Model_peminjaman->barang_pengembalian($id)->result()
            );

            $html = $this->load->view('petugas/surat_peminjaman', $data, TRUE);

            $this->pdfgenerator->generate($html, 'Surat_Peminjaman');
        }
        
    }
