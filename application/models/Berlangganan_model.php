<?php

/**
 *
 */
class Berlangganan_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function save($data)
    {
        $save = $this->db->insert('berlangganan', $data);

        if ($save) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get()
    {

        $show = $this->db->select('*')
            ->from('berlangganan')
            ->get();

        if ($show->num_rows() > 0) {
            return $show->result_array();
        } else {
            return FALSE;
        }
    }



    public function delete($id)
    {
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('berlangganan');
    }
}
