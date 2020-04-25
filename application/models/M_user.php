<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
	
	function tampil_data_akun()
	{
		$query = $this->db->query('SELECT tb_user.id_user, tb_user.nama, tb_user.nip, 							tb_user.username, tb_user.email, 
									tb_user.id_grup, 
									CASE tb_user.status
									WHEN "1" THEN "Aktif"
									WHEN "0" THEN "Tidak Aktif"
									ELSE tb_user.status END AS status_user,
									tb_grup.nama_group as role
									from tb_user LEFT JOIN tb_grup
									ON tb_user.id_grup = tb_grup.id_group');
		return $query;
	}

	function get_role()
	{
		$query = $this->db->query('SELECT * from tb_grup');
		return $query;
	}

	function tambah_user($data)
	{
		$this->db->insert(tb_user, $data);
	}

	function cek_username($username, $email)
	{
		$query = $this->db->query('SELECT * FROM tb_user
			WHERE username = "'.$username.'" or email = "'.$email.'"');
		return $query;
	}

	function get_detail_user($id)
	{
		$query = $this->db->query('SELECT * from tb_user JOIN tb_grup
					ON tb_user.id_grup = tb_grup.id_group
					AND tb_user.id_user = "'.$id.'"');
		return $query;
	}

	function get_data_simpeg($nip)
	{
		$db_simpeg = $this->load->database('db_simpeg', TRUE);
		return $query = $db_simpeg->query('SELECT spg_data_current.NIP, spg_data_current.NM_PEG,
			spg_data_current.NM_JNS_KELAMIN_PEG, spg_data_current.NPWP,
			spg_data_current.NM_UNIT_ES2, spg_data_current.NM_JABATAN,
			spg_data_current.KD_UNIT_ORG, spg_data_current.NM_PANGKAT, spg_data_current.NM_KANTOR,
			spg_08_unit_organisasi.NM_UNIT_ORG, spg_data_current.KET_PEND_FORMAL, spg_data_current.NM_LEMB_PEND_FORMAL
			from spg_data_current
			JOIN spg_08_unit_organisasi
			ON spg_data_current.KD_UNIT_ORG = spg_08_unit_organisasi.KD_UNIT_ORG
			WHERE spg_data_current.NIP = "'.$nip.'"');
	}

	function edit_data($where,$table)
	{		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	
	function tambah_data_role($tabel,$data)
	{
		$res=$this->db->insert($tabel,$data);
		return $res;
	}
}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */