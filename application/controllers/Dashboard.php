<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//load model admin
        $this->load->model('Admin');
        //cek session dan level user
	}

	public function index()
	{
		if($this->Admin->logged_id())
	    {
			$id_grup = $this->session->userdata("grup");
			$data['menu'] = $this->Admin->tampil_menu($id_grup)->result();
			$query = $this->Admin->tampil_menu($id_grup)->result();
			$this->load->view('pages/header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('pages/footer');
		}else{
			redirect('Login');
		}
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */