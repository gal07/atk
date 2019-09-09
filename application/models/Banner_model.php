<?php

/**
 *
 */
class Banner_model extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function save($data)
    {
        $save = $this->db->insert('banner', $data);

        if ($save) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get()
    {

        $show = $this->db->select('*')
            ->from('banner')
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
            ->from('banner')
            ->where('id_banner', $id)
            ->get();

        if ($show->num_rows() > 0) {
            return $show->row_array();
        } else {
            return FALSE;
        }
    }


    public function update($data, $id)
    {

        $this->db->where('id_banner', $id);
        $this->db->update('banner', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_banner', $id);
        $this->db->delete('banner');
    }
}
