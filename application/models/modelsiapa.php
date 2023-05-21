<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelsiapa extends CI_Model
{
    private $view = 'detail_barang';
    private $table = 'barang';
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_barang" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function insert($barang)
	{
		$this->db->insert($this->table, $barang);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
    public function getByIdd($id)
    {
        return $this->db->get_where($this->view, ["id_barang" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function getById_gambar($id)
    {
        return $this->db->get_where($this->table, ["id_barang" => $id]);
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function get_pepet()
    {
        $query = $this->db->get_where($this->table, array('status' =>'New'));
        return $query->result();
    }
    public function update_dataBarang($where, $data)
    {
        $this->db->update('barang', $data, $where);
        return $this->db->affected_rows();
    }
    function getByGambar($id)
    {
        $this->db->select('gambar');
        $this->db->from('gambar');
        $this->db->where('id_gambar',$id);
        $query=$this->db->get();
        return $query;
    }
    public function get_by_id($id_barang)
	{
		$query = $this->db->get_where($this->view, array('id_barang' => $id_barang));
		return $query;
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
    public function getAllView()
    {
        $this->db->from($this->view);
        $this->db->order_by("id_barang", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tb_barang order by id_barang desc
    }
    function add_barang($data)
    {
        $this->db->insert('barang',$data);
        return $this->db->insert_id();
    }
    function update_barang($where, $data)
    {
        $this->db->update('barang', $data, $where);
        return $this->db->affected_rows();
    }
    function hapus_barang($id)
    {
        $this->db->where('id_barang', $id);
        $this->db->delete('barang');
    }
    public function update($barang)
	{
		if (!isset($barang['id_barang'])) {
			return;
		}
		return $this->db->update($this->table, $barang, ['id_barang' => $barang['id_barang']]);
	}
    public function delete($id)
	{
		if (!$id) {
			return;
		}
		return $this->db->delete($this->table, ['id_barang' => $id]);
	}
}