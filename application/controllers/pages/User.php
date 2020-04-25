<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller 
{

	function __construct()
	{
		parent::__construct();
		//load model admin
        $this->load->model('Admin');
        //cek session dan level user
        $this->load->model('M_user');

	}

	public function index()
	{
		if($this->Admin->logged_id())
	    {
			//1) menampilkan menu berdasarkan grup user
			$id_grup = $this->session->userdata("grup");//mendapatkan id grup
			$data['menu'] = $this->Admin->tampil_menu($id_grup)->result();//tampil menu
			$query = $this->Admin->tampil_menu($id_grup)->result();
			$data['data_akun'] = $this->M_user->tampil_data_akun()->result();
			//

			$data_id = $this->M_user->tampil_data_akun()->result();

			$this->load->view('pages/header', $data);
			$this->load->view('admin/v_user');
			$this->load->view('pages/footer');
		}else{
			redirect('Login');
		}
	}

	//fungsi untuk menambah user
	function tambah_user()
	{
		if($this->Admin->logged_id())
	    {
	    	$id_grup = $this->session->userdata("grup");//mendapatkan id grup
			$data['menu'] = $this->Admin->tampil_menu($id_grup)->result();//tampil menu
			$query = $this->Admin->tampil_menu($id_grup)->result();//menampilkan menu
			$data['role'] = $this->M_user->get_role()->result();//mendapatkan role
			
	    	$this->load->view('pages/header', $data);
	    	$this->load->view('admin/v_tambah_user');
	    	$this->load->view('pages/footer');
	    }
	}

	//fungsi untuk registrasi user baru
	function register_user()
	{
		if($this->Admin->logged_id())
	    {
	    	$config['encrypt_name'] 		= TRUE;
	    	$config['upload_path']          = './assets/images/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png|JPG';
			$config['max_size']             = 5000;
			$config['max_width']            = 1920 ;
			$config['max_height']           = 1080 ;
			$this->load->library('upload', $config);

			$this->upload->initialize($config);
			if(!empty($_FILES['file_foto']['name']))
			{
				if ($this->upload->do_upload('file_foto'))
				{
					$gbr = $this->upload->data();
					//Compress Image
	                $config['image_library']='gd2';
	                $config['source_image']='./assets/templates/images/'.$gbr['file_name'];
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= FALSE;
	                $config['quality']= '50%';
	                $config['width']= 600;
	                $config['height']= 400;
	                $config['new_image']= './assets/templates/images/'.$gbr['file_name'];
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();

	                $gambar=$gbr['file_name'];

	                $data = array(
					        'nama'        => $this->input->post('nama'),
					        'nip'         => $this->input->post('nip'),
					        'username'	  => $this->input->post('username'),
					        'password'	  => md5($this->input->post('password1')),
					        'no_hp'		  => $this->input->post('no_hp'),
					        'email' 	  => $this->input->post('email'),
					        'id_grup'	  => $this->input->post('role'),
					        'status'	  => $this->input->post('status'),
					        'avatar'	  => $gambar,
    				);
    				$username = $this->input->post('username');
    				$email = $this->input->post('email');
    				$data_user = $this->M_user->cek_username($username, $email);
    				if($data_user->num_rows() > 0)
    				{
    					$this->session->set_flashdata('error', 'Username atau email sudah digunakan..!');
    					redirect('pages/tambah_user');
    				}else{
    					$this->session->set_flashdata('berhasil', 'Berhasil menambahkan user...');
    					$this->M_user->tambah_user($data);
    					redirect('pages/user');
    				}
				} 
			} $this->session->set_flashdata('error', 'File foto belum diupload / ukuran foto terlalu besar');
    					redirect('pages/user/tambah_user');
		}
	}

	//fungsi menampilkan detail user
	function detail($id, $nip)
	{
		//1) menampilkan menu berdasarkan grup user
		$id_grup = $this->session->userdata("grup");//mendapatkan id grup
		$data['menu'] = $this->Admin->tampil_menu($id_grup)->result();//tampil menu
		$query = $this->Admin->tampil_menu($id_grup)->result();
		$data['data_akun'] = $this->M_user->tampil_data_akun()->result();
		//

		//2) menampilkan data pegawai di database simpeg
		if($nip <> "0")
		{
			$data['data_simpeg'] = $this->M_user->get_data_simpeg($nip)->result();
			$id_decrypt = decrypt_url($id);
			$data['detail_user'] = $this->M_user->get_detail_user($id_decrypt)->result();
			$this->load->view('pages/header', $data);
			$this->load->view('admin/v_detail_user', $data);
			$this->load->view('pages/footer');
		}else{
			$id_decrypt = decrypt_url($id);
			$data['detail_user'] = $this->M_user->get_detail_user($id_decrypt)->result();
			$this->load->view('pages/header', $data);
			$this->load->view('admin/v_detail_user_ppnpn', $data);
			$this->load->view('pages/footer');
		}	
	}

	//fungsi untuk edit user
	function edit($id){
		//1) menampilkan menu berdasarkan grup user
		$id_grup = $this->session->userdata("grup");//mendapatkan id grup
		$data['menu'] = $this->Admin->tampil_menu($id_grup)->result();//tampil menu
		$query = $this->Admin->tampil_menu($id_grup)->result();
		$data['data_akun'] = $this->M_user->tampil_data_akun()->result();

		//2) memilih user berdasarkan id
		$data['role'] = $this->M_user->get_role()->result();//mendapatkan role
		$id_decrypt = decrypt_url($id);
		$where = array('id_user' => $id_decrypt);
		$data['edit_user'] = $this->M_user->edit_data($where,'tb_user')->result();
		$this->load->view('pages/header', $data);
		$this->load->view('admin/v_edit_user',$data);
		$this->load->view('pages/footer');
	}

	function update()
	{	

		if($this->Admin->logged_id())
	    {
	    	$config['encrypt_name'] 		= TRUE;
	    	$config['upload_path']          = './assets/images/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png|JPG';
			$config['max_size']             = 5000;
			$config['max_width']            = 1920 ;
			$config['max_height']           = 1080 ;
			$this->load->library('upload', $config);

			$this->upload->initialize($config);

	    if(!empty($_FILES['file_foto']['name']))
			{
	    	if ($this->upload->do_upload('file_foto'))
				{
					$gbr = $this->upload->data();
					//Compress Image
	                $config['image_library']='gd2';
	                $config['source_image']='./assets/templates/images/'.$gbr['file_name'];
	                $config['create_thumb']= FALSE;
	                $config['maintain_ratio']= FALSE;
	                $config['quality']= '50%';
	                $config['width']= 600;
	                $config['height']= 400;
	                $config['new_image']= './assets/templates/images/'.$gbr['file_name'];
	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();

	                $gambar=$gbr['file_name'];

					$data = array(
					        'nama'        => $this->input->post('nama'),
					        'nip'         => $this->input->post('nip'),
					        'username'	  => $this->input->post('username'),
					        'password'	  => md5($this->input->post('password1')),
					        'no_hp'		  => $this->input->post('no_hp'),
					        'email' 	  => $this->input->post('email'),
					        'id_grup'	  => $this->input->post('role'),
					        'status'	  => $this->input->post('status'),
					        'avatar'	  => $gambar,
    				);
					$id_decrypt = decrypt_url($this->input->post('user_id'));
    				$where = array(
							'id_user' => $id_decrypt
					);

    				$this->session->set_flashdata('berhasil', 'Berhasil mengupdate user...');
    				$this->M_user->update_data($where,$data,'tb_user');
    				redirect('pages/user');
				}
			}$this->session->set_flashdata('error', 'File foto belum diupload / ukuran foto terlalu besar');
						$id = $this->input->post('user_id');
						$url = "pages/user/edit/".$id;
    					redirect($url);
		}
		
	}

	function delete($id)
	{
		$id_decrypt = decrypt_url($id);
		$where = array('id_user' => $id_decrypt);
		$this->M_user->hapus_data($where,'tb_user');
		$this->session->set_flashdata('berhasil', 'Berhasil menghapus user...');
		redirect('pages/user');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */