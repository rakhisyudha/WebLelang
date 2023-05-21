<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelapa extends CI_Model
{
    private $check = "user",
            $table = "lelang",
            $view = 'detail_lelang',
            $view2 = 'lelang_berlangsung';
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_lelang" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function get_by_id($id_lelang)
    {
        $query = $this->db->get_where($this->table, array('id_lelang' => $id_lelang));
        return $query;
    }
    public function getByIdd($id)
    {
        return $this->db->get_where($this->view, ["id_lelang" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    //menampilkan semua data barang
    public function getAja()
    {
        $this->db->from($this->view);
        $this->db->order_by("nama_barang", "asc");
        $this->db->where("status !=","confirmed");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tb_barang order by id_barang desc
    }
    function add_lelang($data)
    {
        $this->db->insert('lelang',$data);
        return $this->db->insert_id();
    }
    public function update_dataLelang($where, $data)
    {
        $this->db->update('lelang', $data, $where);
        return $this->db->affected_rows();
    }
    public function get_guguk()
    {
        $query = $this->db->get_where($this->view2);
        return $query->result();
    }
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id_lelang", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tb_barang order by id_barang desc
    }
    public function getAllView()
    {
        $this->db->from($this->view);
        $this->db->order_by("id_lelang", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tb_barang order by id_barang desc
    }
    public function berlangsung_by_id($id_lelang)
    {
        $query = $this->db->get_where($this->view2, array('id_lelang' => $id_lelang));
        return $query;
    }

    public function getSome()
    {
        $this->db->from('detail_lelang');
        $this->db->where('status !=', 'confirmed');
        $query=$this->db->get();
    }
    public function update($lelang)
    {
        if (!isset($lelang['id_lelang'])) {
            return;
        }
        return $this->db->update($this->table, $lelang, ['id_lelang' => $lelang['id_lelang']]);
    }
    public function update_lelang($where, $data)
    {
        $this->db->update('detail_lelang', $data, $where);
        return $this->db->affected_rows();
    }
    public function search($keyword)
    {
        if (!$keyword) {
            return null;
        }
        $this->db->like('nama_barang', $keyword);
        $query = $this->db->get($this->view2);
        return $query->result();
    }
}