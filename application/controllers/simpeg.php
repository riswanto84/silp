<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class simpeg extends CI_Controller {

	public function index()
	{
		$this->load->model('M_user');
		$nip = "198401302008111001";
		$data_simpeg = $this->M_user->get_data_simpeg($nip)->result();
		foreach ($data_simpeg as $hasil) {
			echo $hasil->NIP."</br>";
			echo $hasil->NM_PEG."</br>";
		}
	}

}

/* End of file simpeg.php */
/* Location: ./application/controllers/simpeg.php */