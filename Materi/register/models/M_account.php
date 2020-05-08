<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_account extends CI_Model{
    function daftar($data){
        $this->db->insert('users', $data);
    }
    function cekuid($id)
    {
        $query = $this->db->query("SELECT MAX(users_id) as usid FROM users WHERE users_id LIKE U%");
        $hasil = $query->result_array();
        return $hasil->usid;
    }
}
?>