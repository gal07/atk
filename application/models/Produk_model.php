<?php

/**
 *
 */
class Produk_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function save($data)
    {
        $save = $this->db->insert('produk', $data);

        if ($save) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get()
    {

        $show = $this->db->select('*')
            ->from('produk')
            ->get();

        if ($show->num_rows() > 0) {
            return $show->result_array();
        } else {
            return FALSE;
        }
    }

    public function getActive()
    {

        $show = $this->db->select('*')
            ->from('produk')
            ->where('aktif', 1)
            ->get();

        if ($show->num_rows() > 0) {
            return $show->result_array();
        } else {
            return FALSE;
        }
    }

    public function get_spesific($id)
    {

        $show = $this->db->select('*')
            ->from('produk')
            ->where('id_produk', $id)
            ->get();

        if ($show->num_rows() > 0) {
            return $show->row_array();
        } else {
            return FALSE;
        }
    }


    public function update($data, $id)
    {

        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }
}
