<?php 
 
class m_resep extends CI_Model{
    
    function tampil_data(){
        return $this->db->query("SELECT * FROM resep, analisa, pendaftaran, diagnosa WHERE pendaftaran.id_pendaftaran=analisa.id_pendaftaran AND pendaftaran.id_pendaftaran=diagnosa.id_pendaftaran AND  pendaftaran.id_pendaftaran=resep.id_pendaftaran");

    }
    
    function tambah_data() {

        $data = array(
            'id_pendaftaran' => $this->input->post('id_pendaftaran'),
            'resep' => $this->input->post('resep')
            );
        $this->db->insert('resep', $data);
        redirect('../bidan/resep');
    }
  
    function ubah_data ($id_resep) {
 
        $data = array(
            'id_pendaftaran' => $this->input->post('id_pendaftaran'),
            'resep' => $this->input->post('resep')
            );

        $this->db->where(array('id_resep' => $id_resep ));
        $this->db->update('resep', $data);
        redirect('../bidan/resep');
    }
    
    function hapus_data ($id_resep) {
        $this->db->where(array('id_resep' => $id_resep));
        $this->db->delete('resep');
        redirect('../bidan/resep');
    }

}