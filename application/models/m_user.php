<?php 
 
class m_user extends CI_Model{
	function tampil_data(){
		return $this->db->get('ms_user');
    }
    
    function tambah_data() {
        
		$data = array(
			'username' => $this->input->post('username'),
			'pass' => MD5($this->input->post('pass')),
			'level' => $this->input->post('level')
			);
		$this->db->insert('ms_user', $data);
		redirect('../admin/user');
    }
  
    function ubah_data ($id_user) {
    	$data = array(
			'username' => $this->input->post('username'),
			'pass' => MD5($this->input->post('pass')),
			'level' => $this->input->post('level'),
			);
		$this->db->where(array('id_user' => $id_user));
		$this->db->update('ms_user', $data);
		redirect('../admin/user');
	}
	
	function hapus_data ($id_user) {
		$this->db->where(array('id_user' => $id_user));
		$this->db->delete('ms_user');
		redirect('../admin/user');
    }

}