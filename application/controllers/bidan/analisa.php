<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class analisa extends CI_Controller {
 
        function __construct(){
                        parent::__construct();		
                        $this->load->model('m_pendaftaran');
                        $this->load->model('m_analisa');
                        $this->load->helper('url');
        }

        public function index(){ 
        if($this->session->userdata('akses')=='2' ){
            $data['query'] = $this->m_analisa->tampil_data();
            $data['analisa'] = $this->m_analisa->tampil_data();

                $this->load->view('headerBidan', $data);
                $this->load->view('bidan/analisa', $data);
                $this->load->view('footer', $data);

         }else{
            echo "Halaman tidak ditemukan";
            
         }
     }
        
        public function add(){
                $id_analisa = $this->input->post('id_analisa');

                if(empty($id_analisa)) {
                        $this->m_analisa->tambah_data();
 
                }else {
                        $this->m_analisa->ubah_data($id_analisa);
        		}
        }

        public function delete(){
                $id_analisa = $this->input->post('id_analisa1');
                $this->m_analisa->hapus_data($id_analisa);
        }
}

?>