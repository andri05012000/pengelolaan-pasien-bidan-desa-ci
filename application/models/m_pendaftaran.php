<?php 
 
class m_pendaftaran extends CI_Model{
	
	function tampil_data(){
		return $this->db->get('pendaftaran');

    }
    
    function tambah_data() {

		$data = array(
			'id_user' => $this->input->post('id_user'),
		    'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat')
			);
		$this->db->insert('pendaftaran', $data);
		redirect('../admin/pendaftaran');
    }
  
    function ubah_data ($id_pendaftaran) {
 
		$data = array(
		    'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat')
			);

		$this->db->where(array('id_pendaftaran' => $id_pendaftaran ));
		$this->db->update('pendaftaran', $data);
		redirect('../admin/pendaftaran');
	}
	
	function hapus_data ($id_pendaftaran) {
		$this->db->where(array('id_pendaftaran' => $id_pendaftaran));
		$this->db->delete('pendaftaran');
		redirect('../admin/pendaftaran');
    }

}