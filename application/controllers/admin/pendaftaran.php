<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pendaftaran extends CI_Controller {
 
        function __construct(){
                        parent::__construct();		
                        $this->load->model('m_pendaftaran');
                        $this->load->helper('url');
        }

        public function index(){ 
        if($this->session->userdata('akses')=='1' ){
            $data['query'] = $this->m_pendaftaran->tampil_data();
            $data['pendaftaran'] = $this->m_pendaftaran->tampil_data();

                $this->load->view('headerAdmin', $data);
                $this->load->view('admin/pendaftaranPasien', $data);
                $this->load->view('footer', $data);

         }else{
            echo "Halaman tidak ditemukan";
            
         }
     }
        
        public function add(){
                $id_pendaftaran = $this->input->post('id_pendaftaran');

                if(empty($id_pendaftaran)) {
                        $this->m_pendaftaran->tambah_data();
 
                }else {
                        $this->m_pendaftaran->ubah_data($id_pendaftaran);
        		}
        }

        public function delete(){
                $id_pendaftaran = $this->input->post('id_pendaftaran1');
                $this->m_pendaftaran->hapus_data($id_pendaftaran);
        }
}

?>