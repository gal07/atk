<?php

class Dasbor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        if (!$this->session->userdata('username')) {
            redirect('forbidden');
        }
    }
    public function index($admin = 'dasbor')
    {
        if (!file_exists(APPPATH . 'views/admin/' . $admin . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

            $data['title'] = 'Dasbor Toko Reggie';
            $this->load->view('back/templates/header', $data);
            $this->load->view('admin/' . $admin);
            $this->load->view('back/templates/footer');
        }
    }
}
