<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelaja extends CI_Model
{
    private $table = 'lelang_berlangsung';
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_barang" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }

    //menampilkan semua data barang
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id_barang", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tb_barang order by id_barang desc
    }
}