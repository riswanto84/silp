<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_SK_Pokja extends CI_Model {

	function tampil_sk()
	{
		$query = $this->db->query('SELECT * FROM tb_sk_pokja');
		return $query;
	}

	function tambah_sk($data)
	{
		$this->db->insert(tb_sk_pokja, $data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function edit_sk($where,$table)
	{		
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function tampil_anggota($id_sk)
	{
		$query = $this->db->query('SELECT tb_user.nama, tb_user.nip, tb_anggota_pokja.id_sk, tb_sk_pokja.no_sk,
			tb_sk_pokja.tanggal_sk, tb_sk_pokja.perihal, tb_sk_pokja.status
			FROM tb_user JOIN tb_anggota_pokja 
			ON tb_user.id_user = tb_anggota_pokja.id_user
			JOIN tb_sk_pokja ON tb_anggota_pokja.id_sk = tb_sk_pokja.id_sk
			AND tb_anggota_pokja.id_sk = "'.$id_sk.'"
			');
		return $query;
	}

	function data_sk($id_sk)
	{
		$query = $this->db->query('SELECT * from tb_sk_pokja WHERE id_sk = "'.$id_sk.'"');
		return $query;
	}
	

}

/* End of file m_SK_Pokja.php */
/* Location: ./application/models/m_SK_Pokja.php */