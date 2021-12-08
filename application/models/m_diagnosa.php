<?php 
 
class m_diagnosa extends CI_Model{
    
    function tampil_data(){
        return $this->db->query("SELECT * FROM diagnosa, pendaftaran WHERE pendaftaran.id_pendaftaran=diagnosa.id_pendaftaran");

    }
    
    function tambah_data() {

        $data = array(
            'id_pendaftaran' => $this->input->post('id_pendaftaran'),
            'diagnosa' => $this->input->post('diagnosa')
            );
        $this->db->insert('diagnosa', $data);
        redirect('../admin/diagnosa');
    }
  
    function ubah_data ($id_diagnosa) {
 
        $data = array(
            'id_pendaftaran' => $this->input->post('id_pendaftaran'),
            'diagnosa' => $this->input->post('diagnosa')
            );

        $this->db->where(array('id_diagnosa' => $id_diagnosa ));
        $this->db->update('diagnosa', $data);
        redirect('../admin/diagnosa');
    }
    
    function hapus_data ($id_diagnosa) {
        $this->db->where(array('id_diagnosa' => $id_diagnosa));
        $this->db->delete('diagnosa');
        redirect('../admin/diagnosa');
    }

}