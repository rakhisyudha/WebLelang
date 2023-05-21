<?php
defined('BASEPATH') or exit('No direct script access allowed');

class modelaku extends CI_Model
{
    private $table = 'penawaran';
    private $view = 'riwayat_penawaran';
    private $view2 = 'detail_penawaran';
    private $viewMax   = 'get_max_penawaran';
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->view, ["nik" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from tb_barang where id_barang='$id'
    }
    public function get_tawar_lelang($id_lelang)
    {
        $this->db->order_by('harga_penawaran', 'desc');
        $query = $this->db->get_where($this->view2, array('id_lelang' => $id_lelang));
        return $query->result();
    }
    public function get_by_id($id_penawaran)
    {
        $query = $this->db->get_where($this->view2, array('id_penawaran' => $id_penawaran));
        return $query;
    }
    public function get_by_lelang($id_lelang)
    {
        $query = $this->db->get_where($this->viewMax, array('id_lelang' => $id_lelang));
        $this->db->limit(1);
        return $query;
    }
    //menampilkan semua data barang
    public function getAll()
    {
        $this->db->from($this->view2);
        $this->db->order_by("id_penawaran", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tb_barang order by id_barang desc
    }
    public function get_all()
    {
        $query = $this->db->get_where($this->view2);
        return $query->result();
    }

    
    public function get_by_penawar($id_masyarakat)
    {
        $this->db->order_by('tgl_penawaran', 'desc');
        $query = $this->db->get_where($this->view2, array('id_masyarakat' => $id_masyarakat));
        return $query->result();
    }
    public function getAlltb()
    {
        $this->db->from($this->table);
        $this->db->order_by("id_penawaran", "asc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from tb_barang order by id_barang desc
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }
    function add_penawaran($data)
    {
        $this->db->insert('penawaran',$data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        if (!$id) {
            return;
        }
        return $this->db->delete($this->table, ['id_penawaran' => $id]);
    }
}