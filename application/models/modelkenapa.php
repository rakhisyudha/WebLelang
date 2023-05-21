<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelkenapa extends CI_Model
{
    private $table = 'gambar';
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_gambar" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function insert($gambar)
	{
		$this->db->insert($this->table, $gambar);
		$insert_id = $this->db->insert_id();
		return  $insert_id;
	}
    public function getById_barang($id)
    {
        return $this->db->get_where($this->table, ["id_barang" => $id, 'utama' => 1]);
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function deleteByBarang($id_barang)
	{
		if (!$id_barang) {
			return;
		}
		return $this->db->delete($this->table, ['id_barang' => $id_barang]);
	}
    public function get_by_idBarang($id_barang)
	{
		$query = $this->db->get_where($this->table, array('id_barang' => $id_barang));
		return $query->result();
	}
    public function update($gambar)
	{
		if (!isset($gambar['id_gambar'])) {
			return;
		}
		return $this->db->update($this->table, $gambar, ['id_gambar' => $gambar['id_gambar']]);
	}
    public function get_by_id($id_gambar)
	{
		$query = $this->db->get_where($this->table, array('id_gambar' => $id_gambar));
		return $query;
	}
    public function get_utama_idBarang($id_barang)
	{
		$query = $this->db->get_where($this->table, array('id_barang' => $id_barang, 'utama' => 1));
		return $query;
	}

    //menampilkan semua data barang
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("urutan", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tb_barang order by id_barang desc
    }
    function add_gambar($data)
    {
        $this->db->insert('gambar',$data);
        return $this->db->insert_id();
    }
    public function delete($id_gambar)
	{
		if (!$id_gambar) {
			return;
		}
		return $this->db->delete($this->table, ['id_gambar' => $id_gambar]);
	}
    function hapus_gambar($id)
    {
        $this->db->where('id_gambar', $id);
        $this->db->delete('gambar');
    }
}
?>
