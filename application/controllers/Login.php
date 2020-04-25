<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
</head>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load library form validasi
        $this->load->library('form_validation');
        //load model Admin
        $this->load->model('Admin');
	}

	public function index()
	{
		if($this->Admin->logged_id())
			{
				//jika memang session sudah terdaftar, maka redirect ke halaman beranda
				$folder = $this->session->userdata("role")."/dashboard";
				redirect($folder);

			}else{

				//jika session belum terdaftar

				//set form validation
	            $this->form_validation->set_rules('username', 'Username', 'required');
	            $this->form_validation->set_rules('password', 'Password', 'required');

	            //set message form validation
	            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
	                <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

	            //cek validasi
				if ($this->form_validation->run() == TRUE) {

				//get data dari FORM
	            $username = $this->input->post("username", TRUE);
	            $password = MD5($this->input->post('password', TRUE));

	            //checking data via model
	            $checking = $this->Admin->check_login('tb_user', array('username' => $username), array('password' => $password));

	           
	            //jika ditemukan, maka create session
	            if ($checking != FALSE) {
	                foreach ($checking as $apps) {
	                    $session_data = array(
	                        'user_id'   => $apps->id_user,
	                        'user_name' => $apps->username,
	                        'user_pass' => $apps->password,
	                        'user_nama' => $apps->nama,
	                        'nip'		=> $apps->nip,
	                        'grup'      => $apps->id_grup,
	                        'avatar'	=> $apps->avatar,
	                        'role'		=> $role
	                    );
	                    //set session userdata
	                    $ip_addres = $this->input->ip_address();
	                    helper_log("login", "login", $session_data['user_name'], $ip_addres);
	                    $this->session->set_userdata($session_data);
                        redirect('Dashboard');
	                }
	            }else{

	            	$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
	            	$this->load->view('Login', $data);
	            }

	        }else{

	            $this->load->view('Login');
	        }

		}
	}

//fungsi log out destroy session
	public function logout()
	{
		$ip_addres = $this->input->ip_address();
      	$username = $this->session->userdata("user_name");
     	helper_log("logout", "log out", $username, $ip_addres);
		$this->session->sess_destroy();
		redirect('Login');
	}

	function forgot_password()
	{
		$this->load->view('forgot_password');
	}

	function send_email($mail_to, $message)
	{
		$get_mail_system = $this->Admin->get_mail_system()->row();
		if ($get_mail_system) 
		{
			$ci = get_instance($mail_to);
	        $ci->load->library('email');
	        $config['protocol'] 	= $get_mail_system->protocol;
	        $config['smtp_host']	= $get_mail_system->host_name;
	        $config['smtp_port'] 	= $get_mail_system->port;
	        $config['smtp_user'] 	= $get_mail_system->mail_adress;
	        $config['smtp_pass']	= $get_mail_system->password;
	        $config['charset'] = "utf-8";
	        $config['mailtype'] = "html";
	        $config['newline'] = "\r\n";
	        $ci->email->initialize($config);
	        $ci->email->from($get_mail_system->mail_adress, 'Sistem Informasi Layanan Pengadaan');
	        $mailto = decrypt_url($mail_to);
	        $list = $mailto;
	        $pesan = decrypt_url($message);
	        $ci->email->to($list);
	        $ci->email->subject('ukpbj-no-reply@kemsos.go.id');
	        $ci->email->message($pesan);
		} else{ echo "mail system error";}

	}

	function check_valid_email()
	{
		$mail = $this->input->post('email');
		$chek_mail = $this->Admin->check_mail_account($mail)->result();
		if ($chek_mail) 
		{
			foreach ($chek_mail as $account) 
			{
				$id_encrypt = encrypt_url($account->id_user);
				$username = $account->username;
				$mail_to = encrypt_url($mail);
				$link_lupa = base_url('login/new_password')."/".$id_encrypt;

				$text = "<p style='text-align: justify;'>&nbsp;</p>
						<p style='text-align: justify;'>username anda adalah :</p>
						<p style='text-align: justify;'><span style='text-decoration: underline;'>".$username."</span></p>
						<p style='text-align: justify;'>Klik <a href='".$link_lupa."'> tautan ini</a> untuk merubah password.</p>
						<p style='text-align: justify;'>&nbsp;</p>
						<p><strong><em>Sistem Informasi Layanan Pengadaan (SILP) Kementerian Sosial</em></strong></p>
						<p><em>Jl. Salemba Raya no. 28 Jakarta Pusat </em></p>
						<p><a href='http://www.pengadaan.kemsos.go.id'><em>www.pengadaan.kemsos.go.id</em></a></p>'";

				$message = encrypt_url($text);

				//memanggil fungsi kirim email
				$this->send_email($mail_to, $message);
				if ($this->email->send()) 
		        {
		           $data['error'] = "<div><p class='bg-warning'>tautan lupa username/password sudah dikirim, silahkan cek email anda</p></div><br/>";
		           $this->load->view('Login', $data);
		        } else { show_error($this->email->print_debugger()); }

			}
		}else{
			$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> akun email tersebut tidak terdaftar..!</div></div>';
	            	$this->load->view('forgot_password', $data);
		}
	}

	function new_password($id)
		{
			$data['id'] = $id;
			$this->load->view('form_new_password', $data);
		}

	function update_password()
	{
		$this->form_validation->set_rules('password1','password1','required|alpha_numeric');
		$this->form_validation->set_rules('password2', 'Retype password', 'required|matches[password1]');
		if ($this->form_validation->run() == FALSE) {
			$data['id'] = decrypt_url($this->input->post('id_user'));
			$data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
	                	<div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> password tidak cocok..!</div></div>';
	            	$this->load->view('form_new_password', $data);
		}else{
			$password = MD5($this->input->post('password1'));
	    	$id = decrypt_url($this->input->post('id_user'));
	    	$this->Admin->update_new_password_when_forgot($id,$password);
	    	$data['error'] = "<div><p class='bg-warning'>password berhasil diubah, silahkan login kembali menggunakan password baru</p></div><br/>";
	            	$this->load->view('Login', $data);
		}

	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */