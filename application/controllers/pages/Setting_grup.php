<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class setting_grup extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//load model admin
        $this->load->model('Admin');
        //cek session dan level user
        $this->load->model('M_user');
        //load model setting
        $this->load->model('M_setting');

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
	    	
			//mendapatkan data grup
	    	$data['data_grup'] = $this->M_setting->get_group()->result();
	    	
	    	$this->load->view('pages/header', $data);
			$this->load->view('admin/v_grup');
			$this->load->view('pages/footer');
		}else{
			redirect('Login');
		}
	}

	function update()
	{
		if($this->Admin->logged_id())
	    {
	    	$data = array('nama_group' => $this->input->post('nama_grup'));
	    	$id = $this->input->post('id_group');
	    	$where = array('id_group' => $id);
	    	$this->session->set_flashdata('berhasil', 'Berhasil mengupdate grup...');
	    	$this->M_setting->update($where,$data,'tb_grup');
	    	redirect('pages/setting_grup');
	    }else{
			redirect('Login');
		}
	}

	function delete($id)
	{
		if($this->Admin->logged_id())
	    {
			$where = array('id_group' => decrypt_url($id));
			$this->M_setting->delete($where,'tb_grup');
			$this->session->set_flashdata('berhasil', 'Berhasil menghapus grup...');
			redirect('pages/setting_grup');
		}else{
			redirect('Login');
		}
	}

	function tambah_grup()
	{
		if($this->Admin->logged_id())
	    {
	    	//1) menampilkan menu berdasarkan grup user
			$id_grup = $this->session->userdata("grup");//mendapatkan id grup
			$data['menu'] = $this->Admin->tampil_menu($id_grup)->result();//tampil menu
			$query = $this->Admin->tampil_menu($id_grup)->result();
			$data['data_akun'] = $this->M_user->tampil_data_akun()->result();

			$this->load->view('pages/header', $data);
			$this->load->view('admin/v_tambah_grup');
			$this->load->view('pages/footer');

	    }else{
			redirect('Login');
		}
	}

	function register_group(){
		if($this->Admin->logged_id())
	    {
	    	$data = array('nama_group' => $this->input->post('nama_grup'), );
	    	$this->session->set_flashdata('berhasil', 'Berhasil menambahkan grup...');
    		$this->M_setting->tambah_grup($data);
    		redirect('pages/setting_grup');
	    }else{
			redirect('Login');
		}
	}

	function get_privilege()
	{
		if($this->Admin->logged_id())
	    {
	    	//1) menampilkan menu berdasarkan grup user
			$id_grup = $this->session->userdata("grup");//mendapatkan id grup
			$data['menu'] = $this->Admin->tampil_menu($id_grup)->result();//tampil menu
			$query = $this->Admin->tampil_menu($id_grup)->result();
			$data['data_akun'] = $this->M_user->tampil_data_akun()->result();

			//mendapatkan data grup
	    	$data['data_grup'] = $this->M_setting->get_group()->result();

			$this->load->view('pages/header', $data);
			$this->load->view('admin/v_privilege');
			$this->load->view('pages/footer');
	    }else{
			redirect('Login');
		}
	}

	function setting_privilege($id_group)
	{
		if($this->Admin->logged_id())
	    {
			//1) menampilkan menu berdasarkan grup user
			$id_grup = $this->session->userdata("grup");//mendapatkan id grup
			$data['menu'] = $this->Admin->tampil_menu($id_grup)->result();//tampil menu
			$query = $this->Admin->tampil_menu($id_grup)->result();
			$data['data_akun'] = $this->M_user->tampil_data_akun()->result();

			$id_decrypt = decrypt_url($id_group);
			$data['role'] = $this->M_setting->get_menu($id_decrypt);
			$data['kode_groupq'] = $id_decrypt;
			$data['ng']          = $this->db->query("SELECT nama_group FROM tb_grup WHERE id_group='$id_decrypt'")->row();
			$data['tampil_menu'] = $this->M_setting->get_menu_update($id_decrypt)->result();

			//echo $id_encrypt;
			$this->load->view('pages/header', $data);
			$this->load->view('admin/v_setting_privilege', $data);
			$this->load->view('pages/footer');
			}else{
			redirect('Login');
		}
	}

	function update_role()
	{
		if($this->Admin->logged_id())
	    {
			$id_group = $_POST['id_group'];
			$role     = $_POST['role'];
			$id_group_encrypt = encrypt_url($id_group);
			$role=$this->M_setting->update_role($id_group, $role);
			 if($role)
			 {
			 	$this->session->set_flashdata('berhasil', 'Berhasil mengupdate Role...');
			 	redirect('pages/setting_grup/get_privilege/'.$id_group_encrypt);
			 } else{
			 	$this->session->set_flashdata('gagal', 'Gagal mengupdate Role...');
			 	redirect('pages/setting_grup/setting_privilege'.$id_group_encrypt);
			 }
			 }else{
			redirect('Login');
		}
	}

}

/* End of file setting_grup.php */
/* Location: ./application/controllers/setting_grup.php */