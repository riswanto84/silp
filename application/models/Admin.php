<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model {
	
	//fungsi cek level
    function is_role()
    {
        return $this->session->userdata('role');
    }

    //fungsi cek session
    function logged_id()
    {
        return $this->session->userdata('user_id');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    //menampilkan menu berdasarkan previllege
    function tampil_menu($id_grup)
    {
        $query = $this->db->query('SELECT
                    tb_role.id_grup,
                    tb_grup.nama_group,
                    tb_role.id_menu,
                    tb_menu.nama_menu,
                    tb_menu.link,
                    tb_menu.parent,
                    tb_menu.icon, tb_role.`status`
                    FROM
                        tb_role
                    JOIN tb_menu ON tb_role.id_menu = tb_menu.id_menu
                    JOIN tb_grup ON tb_grup.id_group = tb_role.id_grup
                    WHERE tb_role.id_grup = "'.$id_grup.'" AND tb_role.`status` = "1" AND
                    tb_menu.parent = 0');
                        return $query;
                    }

    function tampil_sub_menu($id_grup, $id_menu)
    {
        $query = $this->db->query('SELECT tb_role.id_role, tb_role.id_grup, tb_role.id_menu
                            ,tb_menu.nama_menu, tb_menu.parent, tb_role.status, tb_menu.link
                            from tb_role JOIN tb_menu
                            ON tb_role.id_menu = tb_menu.id_menu
                            WHERE id_grup = "'.$id_grup.'" and tb_menu.parent <> 0
                            AND tb_role.`status` <> "0" AND parent = "'.$id_menu.'"');
        return $query;
    }
	
    //fungsi mengecek role
    function check_role($id_group)
    {
        $query = $this->db->query('SELECT * from tb_grup WHERE id_group = "'.$id_group.'"');
        return $query; 
    }

    function check_mail_account($mail)
    {
        $query = $this->db->query('SELECT * FROM tb_user WHERE email = "'.$mail.'"');
        return $query;
    }

    function update_new_password_when_forgot($id, $password)
    {
        return $this->db->query('UPDATE tb_user set password = "'.$password.'"
                            WHERE id_user = "'.$id.'" ');
    }

    function get_mail_system()
    {
        return $this->db->query('SELECT * FROM tb_mail_system');
    }
}

/* End of file admin.php */
/* Location: ./application/models/admin.php */