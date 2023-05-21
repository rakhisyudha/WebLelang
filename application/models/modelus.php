<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelus extends CI_Model
{
    private $_table = 'user';

    public function get_all()
    {
        $query = $this->db->get_where($this->_table);
        return $query->result();
    }

    public function get_by_id($id_user)
    {
        $query = $this->db->get_where($this->_table, array('id' => $id_user));
        return $query->row();
    }

    public function get_by_user($username)
    {
        $query = $this->db->get_where($this->_table, array('username' => $username));
        return $query;
    }

    public function insert($user)
    {
        $this->db->insert($this->_table, $user);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function update($user)
    {
        if (!isset($user['id'])) {
            return;
        }
        return $this->db->update($this->_table, $user, ['id' => $user['id']]);
    }

    public function verify($username, $password)
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->_table);
        $user = $query->row();
        if (!password_verify($password, $user->password)) {
            return FALSE;
        }
        return true;
    }
}
