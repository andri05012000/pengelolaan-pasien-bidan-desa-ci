<?php
class m_login extends CI_Model{
	
		function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
		$pass=htmlspecialchars($this->input->post('pass',TRUE),ENT_QUOTES);
		
		$query=$this->db->query("SELECT * FROM ms_user WHERE username='".$username."' AND pass='".MD5($pass)."'");
		foreach ($query->result() as $row) {
            $this->session->set_userdata('submit',TRUE);
            $this->session->set_userdata('id_user',$row->id_user);
            $this->session->set_userdata('username',$row->username);
			if ($row->level=='Admin') {
				$this->session->set_userdata('akses','1');
				redirect('berandaAdmin');
			} elseif ($row->level=='Bidan'){
				$this->session->set_userdata('akses','2');
				redirect('berandaBidan');
			}else{
				echo "keluar";
			}
		}
		echo $this->session->set_flashdata('msg','Username Atau Password Salah');
		redirect(base_url());

		//echo "<script>
		//	alert('Username Atau Password Salah');
		//	window.location.replace('".base_url()."');
		//</script>";
    }
}

