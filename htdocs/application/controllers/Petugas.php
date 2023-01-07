<?php

    class Petugas extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('petugas/Model_barang');
            if($this->session->userdata('username') == ""){
                redirect('login');
            }
            elseif($this->session->userdata('level') !== "2")
            {
                redirect('admin');
            }
        }
        
        public function index($page = 'Halaman Petugas')
        {
            $this->load->model('petugas/Model_peminjaman');
            
            $data = array(
                'user' => $this->session->userdata('username'),
                'title' => $page,
                'laporan_terbaru' => $this->Model_peminjaman->laporan_terbaru()->result(),
                'style_css' => 'petugas.css'
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('petugas/sidebar');
            $this->load->view('petugas/home');
            $this->load->view('templates/footer');
        }
        
        public function barang($page = 'Halaman Petugas ')
        {
            $this->load->model('petugas/Model_barang');
            
            $data = array(
                'user' => $this->session->userdata('username'),
                'title' => $page."- Data Barang",
                'style_css' => 'petugas.css',
                'data_barang' => $this->Model_barang->select_all()->result()
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('petugas/sidebar');
            $this->load->view('petugas/data_barang');
            $this->load->view('templates/footer');
        }
        
        public function peminjaman($page = 'Halaman Petugas ')
        {
            
            $data = array(
                'barang' => $this->Model_barang->select_items()->result(),
                'user' => $this->session->userdata('username'),
                'title' => $page."- Peminjaman",
                'style_css' => 'petugas.css'
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('petugas/sidebar');
            $this->load->view('petugas/form_peminjaman');
            $this->load->view('templates/footer');
        }
        
        public function tambah_peminjaman()
        {
            $this->load->model('petugas/Model_peminjaman');
            
            $id = date('dmY')."_".time();
            $nama_lengkap = $this->input->post('nama');
            $bidang = $this->input->post('bidang');
            $tujuan = $this->input->post('tujuan');
            $tgl_pinjam = $this->input->post('tgl_pinjam');
            $tgl_kembali = $this->input->post('tgl_kembali');
            $status = 'Active';
            
            $peminjam = array(
                'id' => $id,
                'nama' => $nama_lengkap,
                'bidang' => $bidang,
                'tujuan' => $tujuan,
                'tgl_pinjam' => $tgl_pinjam,
                'tgl_kembali' => $tgl_kembali,
                'status' => $status
            );
            
            $brg = $this->input->post('barang');
            $result = array();
            foreach($brg as $key => $val)
            {
                $result[] = array(
                    'kode' => $id,
                    'nama_barang' => $_POST['barang'][$key],
                    'kd_barang' => $_POST['kd_brg'][$key],
                    'jml' => $_POST['jml'][$key],
                    'penanggung_jawab' => $_POST['pj'][$key]
                );
            }
            
            $this->Model_peminjaman->insert_items($result, 'barang_peminjam');
            $this->Model_peminjaman->insert($peminjam, 'data_peminjam');
            
            redirect('petugas/peminjaman');
        }
        
        public function proses_pengembalian($id)
        {
            
            $this->load->model('petugas/Model_peminjaman');
            
            $brg = $this->input->post('barang');
            $result = array();
            foreach($brg as $key => $val)
            {
                $result[] = array(
                    'kode' => $_POST['kd_peminjaman'][$key],
                    'kd_barang' => $_POST['kd_brg'][$key],
                    'nama_barang' => $_POST['barang'][$key],
                    'jml' => $_POST['jml'][$key],
                    'penanggung_jawab' => $_POST['pj'][$key]
                );
            }


            $today = date('Y/m/d');
            $status = "SELESAI";

            $data = array(
                'tgl_kembali' => $today,
                'status' => $status 
            );
            $this->Model_peminjaman->pinjam_selesai($data, $id);
            $this->Model_peminjaman->insert_items($result, 'pengembalian');

            redirect('petugas/berhasil');
        }
        
        public function logout(){
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('uid');
            $this->session->unset_userdata('name');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('password');
            
            redirect('login');
        }
        
        public function laporan($page = 'Halaman Petugas')
        {
            $this->load->model('petugas/Model_peminjaman');
            
            $data = array(
                'user' => $this->session->userdata('username'),
                'title' => $page."- Laporan",
                'style_css' => 'petugas.css',
                'laporan' => $this->Model_peminjaman->select_all()->result(),
                'laporan2' => $this->Model_peminjaman->select_all2()->result()
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('petugas/sidebar');
            $this->load->view('petugas/laporan_view');
            $this->load->view('templates/footer');
        }
        public function pengembalian($page = 'Halaman Petugas')
        {
            $this->load->model('petugas/Model_peminjaman');
            
            $data = array(
                'user' => $this->session->userdata('username'),
                'title' => $page."- Laporan",
                'style_css' => 'petugas.css',
                'laporan' => $this->Model_peminjaman->daftar_pengembalian()->result()
            );
            
            $this->load->view('templates/header', $data);
            $this->load->view('petugas/sidebar');
            $this->load->view('petugas/pengembalian_view');
            $this->load->view('templates/footer');
        }
        
        public function hapus_laporan($kode)
        {
            $this->load->model('petugas/Model_peminjaman');
            $this->Model_peminjaman->delete_by_id($kode);
            $this->Model_peminjaman->delete_items($kode);
            
            
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
        
        public function pengembalian_barang($id)
        {
            $this->load->model('petugas/Model_peminjaman');

			$data = array(
                'data_peminjam' => $this->Model_peminjaman->select_by_id($id)->row(),
                'barang_peminjam' => $this->Model_peminjaman->barang_peminjam($id)->result()
			);

            $this->load->view('petugas/bootstrap', $data);
			$this->load->view('petugas/form_pengembalian', $data);
            $this->load->view('templates/footer', $data);
            
        }

        public function berhasil()
        {
            $this->load->view('petugas/bootstrap');
            $this->load->view('petugas/berhasil');
            $this->load->view('templates/footer');
        }
        
        
    }
