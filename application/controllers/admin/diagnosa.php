<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class diagnosa extends CI_Controller {
 
        function __construct(){
                        parent::__construct();		
                        $this->load->model('m_diagnosa');
                        $this->load->model('m_pendaftaran');
                        $this->load->helper('url');
        }

        public function index(){ 
        if($this->session->userdata('akses')=='1' ){
            $data['query'] = $this->m_diagnosa->tampil_data();
            $data['diagnosa'] = $this->m_diagnosa->tampil_data();

                $this->load->view('headerAdmin', $data);
                $this->load->view('admin/diagnosa', $data);
                $this->load->view('footer', $data);

         }else{
            echo "Halaman tidak ditemukan";
            
         }
     }
        
        public function add(){
                $id_diagnosa = $this->input->post('id_diagnosa');

                if(empty($id_diagnosa)) {
                        $this->m_diagnosa->tambah_data();
 
                }else {
                        $this->m_diagnosa->ubah_data($id_diagnosa);
        		}
        }

        public function delete(){
                $id_diagnosa = $this->input->post('id_diagnosa1');
                $this->m_diagnosa->hapus_data($id_diagnosa);
        }
}

?>