<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model','user');
	}

	function index()
	{
		check_already_login();
		$this->load->view('login');
	}


	function cekLogin()
	{	

		$post = $this->input->post();
		if ( isset($_POST['login']) ){
			$username=htmlspecialchars($this->input->post('uname',TRUE),ENT_QUOTES);
			$userpass=htmlspecialchars($this->input->post('upass',TRUE),ENT_QUOTES);	

			$q=$this->user->get_password($username);
        	if($q->num_rows() > 0){ //jika login sebagai dosen
        		$row = $q->row();
        		if (password_verify($userpass, $row->upass)) {
	        		
	        		$params = array(
	        				'is_logged_in' => true,	
	        				'userid' => $row->uid,	
	        				'user_name' => $row->uname,	
	        			);
	                $this->session->set_userdata($params);

	        		echo "
						<script>
							alert('Selamat, Login berhasil');
							window.location='".site_url('dashboard')."';
						</script>
	        		";
        		} else {
        			echo "
					<script>
						alert('Login Gagal, username/password salah');
						window.location='".base_url()."';
					</script>
        		";
        		}
        	} else {

        		echo "
					<script>
						alert('Login Gagal, username/password salah');
						window.location='".base_url()."';
					</script>
        		";
        	}

        } else {
        	redirect(site_url(),'refresh');
        }


    }



    function createuser()
    { 
    	$data['nama_lengkap'] = 'Admin';
    	$data['uname'] = 'admin';
    	$upass = '123';

    	$options = [
		    'cost' => 10,
		];
 
		$data['upass'] = password_hash($upass, PASSWORD_DEFAULT, $options);

		$this->user->insert($data);

    }

    function logout()
    {
	    // $hapus = array('is_logged_in' => false);
	    // $this->session->set_userdata($hapus);

    	$params = array('userid','username');
        $this->session->unset_userdata($params);
		echo "
			<script>
				alert('Selamat, Logout kamu sukses');
				window.location='".base_url()."';
			</script>
		";
        // $url=site_url();
        // redirect($url);
    }

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */