<?php

class Berlangganan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->library('form_validation');
        if (!$this->session->userdata('username')) {
            redirect('forbidden');
        }
    }

    public function index($berlangganan = 'index')
    {
        if (!file_exists(APPPATH . 'views/admin/berlangganan/' . $berlangganan . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

            $data['title'] = 'Berlangganan Toko Reggie';
            $data['data'] = $this->berlangganan_model->get();


            $this->load->view('back/templates/header', $data);
            $this->load->view('admin/berlangganan/' . $berlangganan);
            $this->load->view('back/templates/footer');
        }
    }




    public function delete()
    {

        $id = $this->input->get('id');
        $delete = $this->berlangganan_model->delete($id);
        $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil Menghapus Langganan!</h4>
        
      </div>');
        redirect(base_url('admin/berlangganan'));
    }
}
