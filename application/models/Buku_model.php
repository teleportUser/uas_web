<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    public function get_all($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('penulis', $keyword);
            $this->db->or_like('penerbit', $keyword);
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('buku')->result();
    }

    public function count_all($keyword = null)
    {
        if ($keyword) {
            $this->db->like('judul', $keyword);
            $this->db->or_like('penulis', $keyword);
            $this->db->or_like('penerbit', $keyword);
        }
        return $this->db->count_all_results('buku');
    }

    public function get_by_id($id)
    {
        return $this->db->get_where('buku', ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert('buku', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('buku', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('buku');
    }
}
