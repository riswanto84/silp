<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function index()
	{
		echo "Ini halaman beranda <br/>";
		echo "nama session : ".$this->session->userdata("user_name")."<br/>";
		?>
		<a href="<?php echo base_url() ?>Login/logout">Logout</a>
		<?php
	}

}

/* End of file beranda.php */
/* Location: ./application/controllers/beranda.php */