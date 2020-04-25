<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends CI_Model 
{

	function get_group()
	{
		$query = $this->db->query('SELECT * from tb_grup');
		return $query;
	}

	function update($where,$data,$table)
	{	
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function tambah_grup($data)
	{
		$this->db->insert(tb_grup, $data);
	}

	function get_menu($id)
	{
		$cm=$this->db->query('SELECT id_menu FROM tb_menu')->result_array();
		foreach($cm as $rm){
			$id_menu=$rm['id_menu'];
			$sql="SELECT id_menu from tb_role WHERE id_grup='$id' AND id_menu='$id_menu'";
			$qcm=$this->db->query($sql)->num_rows();
			if($qcm == null){
				$data=array('id_menu'=>$id_menu,'id_grup'=>$id, 'status'=>"0");
				$this->M_user->tambah_data_role('tb_role', $data);
			}
		}
	}

	function get_menu_parent($id_parent)
	{
		$query = $this->db->query('SELECT * FROM tb_menu WHERE id_menu = "'.$id_parent.'"');
		return $query;
	}

	function get_menu_update($id_grup)
	{
		$query = $this->db->query("SELECT tb_role.id_role, tb_role.id_grup, 
			tb_role.id_menu, tb_role.status, tb_menu.nama_menu, CASE parent WHEN 0 THEN '#'  
ELSE parent END AS parent
			from tb_role RIGHT JOIN tb_menu
			on tb_role.id_menu = tb_menu.id_menu
			AND tb_role.id_grup = '$id_grup' 
			AND tb_menu.id_menu <> '0'
			ORDER BY parent ");
		return $query;
	}

	function update_role($id_group,$role){
		$ua=$this->db->query("UPDATE tb_role SET status='0' WHERE id_grup ='$id_group'");
		if($ua){
			$jumlah=count($role);
			for($i=0; $i < $jumlah; $i++){
				$id_role=$role[$i];
				$ur=$this->db->query("UPDATE tb_role SET status='1' WHERE id_role='$id_role'");
			}
		}

		return $ur;
	}


}

/* End of file m_setting.php */
/* Location: ./application/models/m_setting.php */