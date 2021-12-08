<?php 
 
class m_analisa extends CI_Model{
    
    function tampil_data(){
        return $this->db->query("SELECT * FROM analisa, pendaftaran, diagnosa WHERE pendaftaran.id_pendaftaran=analisa.id_pendaftaran AND pendaftaran.id_pendaftaran=diagnosa.id_pendaftaran");

    }
    
    function tambah_data() {

        $data = array(
            'id_pendaftaran' => $this->input->post('id_pendaftaran'),
            'analisa' => $this->input->post('analisa')
            );
        $this->db->insert('analisa', $data);
        redirect('../bidan/analisa');
    }
  
    function ubah_data ($id_analisa) {
 
        $data = array(
            'id_pendaftaran' => $this->input->post('id_pendaftaran'),
            'analisa' => $this->input->post('analisa')
            );

        $this->db->where(array('id_analisa' => $id_analisa ));
        $this->db->update('analisa', $data);
        redirect('../bidan/analisa');
    }
    
    function hapus_data ($id_analisa) {
        $this->db->where(array('id_analisa' => $id_analisa));
        $this->db->delete('analisa');
        redirect('../bidan/analisa');
    }

}