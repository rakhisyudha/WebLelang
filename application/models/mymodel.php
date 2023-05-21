<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mymodel extends CI_Model
{
    private $table = 'masyarakat';
    const SESSION_KEY = 'masyarakat_id';
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_masyarakat" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function get_all()
    {
        $query = $this->db->get_where($this->table);
        return $query->result();
    }
    public function update_pelelang($where, $data)
    {
        $this->db->update('masyarakat', $data, $where);
        return $this->db->affected_rows();
    }
    public function get_by_id($id)
    {
        $query = $this->db->get_where($this->table, array('id_masyarakat' => $id));
        return $query->row();
    }
    public function update($data)
    {
        if (!isset($data['id_masyarakat'])) {
            return;
        }
        return $this->db->update($this->table, $data, ['id_masyarakat' => $data['id_masyarakat']]);
    }
    public function verify($email, $password)
    {
        $this->db->where('email', $email);
        $query = $this->db->get($this->table);
        $data = $query->row();
        if (!password_verify($password, $data->password)) {
            return FALSE;
        }
        return true;
    }
    public function login($email, $password)
	{
		$this->db->where('email', $email);
		$this->db->where('status', 1);
		$query = $this->db->get($this->table);
		$masyarakat = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$masyarakat) {
			return FALSE;
		}

		// cek apakah passwordnya benar?
		if (!password_verify($password, $masyarakat->password)) {
			return FALSE;
		}
		// bikin session
		$this->session->set_userdata([self::SESSION_KEY => $masyarakat->id_masyarakat]);

		return $this->session->has_userdata(self::SESSION_KEY);
	}
    public function current_user() //cek data
	{
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$id = $this->session->userdata(self::SESSION_KEY);
		return $this->db->get_where($this->table, ["id_masyarakat" => $id])->row(); //<=tampilkan hasilnya
	}
    
    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }
}