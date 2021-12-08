<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class resep extends CI_Controller {
 
        function __construct(){
                        parent::__construct();      
                        $this->load->model('m_pendaftaran');
                        $this->load->model('m_analisa');
                        $this->load->model('m_resep');
                        $this->load->helper('url');
        }

        public function index(){ 
        if($this->session->userdata('akses')=='2' ){
            $data['query'] = $this->m_resep->tampil_data();
            $data['resep'] = $this->m_resep->tampil_data();

                $this->load->view('headerBidan', $data);
                $this->load->view('bidan/resep', $data);
                $this->load->view('footer', $data);

         }else{
            echo "Halaman tidak ditemukan";
            
         }
     }
        
        public function add(){
                $id_resep = $this->input->post('id_resep');

                if(empty($id_resep)) {
                        $this->m_resep->tambah_data();
 
                }else {
                        $this->m_resep->ubah_data($id_resep);
                }
        }

        public function delete(){
                $id_resep = $this->input->post('id_resep1');
                $this->m_resep->hapus_data($id_resep);
        }
}

?>