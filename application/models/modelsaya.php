<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelsaya extends CI_Model
{
    private $table = 'user';
    const SESSION_KEY = 'user_id';
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function login($username, $password)
	{
		$this->db->where('username', $username);
		$this->db->where('status', 1);
		$query = $this->db->get($this->table);
		$user = $query->row();

		// cek apakah user sudah terdaftar?
		if (!$user) {
			return FALSE;
		}

		// cek apakah passwordnya benar?
		if (!password_verify($password, $user->password)) {
			return FALSE;
		}
		// bikin session
		$this->session->set_userdata([self::SESSION_KEY => $user->id]);

		return $this->session->has_userdata(self::SESSION_KEY);
	}
    //menampilkan semua data barang
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tb_barang order by id_barang desc
    }
    function update_admin($where, $data)
    {
        $this->db->update('user', $data, $where);
        return $this->db->affected_rows();
    }
    public function current_user() //cek data
	{
        if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}
		$id = $this->session->userdata(self::SESSION_KEY);
		return $this->db->get_where($this->table, ["id" => $id])->row(); //<=tampilkan hasilnya
	}
    public function logout()
    {
        $this->session->unset_userdata(self::SESSION_KEY);
        return !$this->session->has_userdata(self::SESSION_KEY);
    }
}