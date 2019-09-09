<?php

class Banner extends CI_Controller
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

    public function index($banner = 'index')
    {
        if (!file_exists(APPPATH . 'views/admin/banner/' . $banner . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();

            $data['title'] = 'Banner Toko Reggie';
            $data['data'] = $this->banner_model->get();


            $this->form_validation->set_rules('alt', 'Tag ALT', 'required');
            $this->form_validation->set_rules('posisi', 'Posisi', 'required|trim|is_unique[banner.posisi]', [
                'is_unique' => 'Posisi sudah ada, ganti yang lain'
            ]);


            if ($this->form_validation->run() ==  false) {
                $this->load->view('back/templates/header', $data);
                $this->load->view('admin/banner/' . $banner);
                $this->load->view('back/templates/footer');
            } else {
                //upload image
                $config['upload_path'] = './assets/banner';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
                $config['max_size'] = '1024';
                date_default_timezone_set('Asia/Jakarta');
                $config['file_name']  = date('Ymdhis') . '.jpg';
                $config['detect_mime'] = TRUE;
                $this->load->library('upload', $config);

                if ($_FILES['banner']['size'] != 0) {

                    if (!file_exists($config['upload_path'])) {
                        mkdir($config['upload_path']);
                    }

                    if ($this->upload->do_upload('banner')) {
                        echo "<script> alert('oke'); </script>";
                    }
                }
                // data Store
                $data_banner = ($_FILES['banner']['size'] = 1) ? $config['file_name'] : '';

                $data = [
                    'id_banner' => rand(),
                    'banner' => $data_banner,
                    'posisi' => $this->input->post('posisi'),
                    'alt' => $this->input->post('alt'),
                    'aktif' => 1

                ];
                $save = $this->banner_model->save($data);
                if ($save) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Berhasil Menambahkan Banner!</h4>
                    
                  </div>');
                    redirect('admin/banner');
                } else {
                    // $this->session->set_flashdata('failed' , ' Created data Failed');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal Menambahkan Banner!</h4>
                    
                  </div>');
                    redirect(base_url('admin/banner'));
                }
            }
        }
    }

    public function update($banner = 'update')
    {

        if (!file_exists(APPPATH . 'views/admin/banner/' . $banner . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' =>
            $this->session->userdata('username')])->row_array();
            $data['data'] = $this->banner_model->get_spesific($this->input->get('id'));


            $this->form_validation->set_rules('alt', 'Tag ALT', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Ubah Banner Toko Reggie';
                $this->load->view('back/templates/header', $data);
                $this->load->view('admin/banner/' . $banner);
                $this->load->view('back/templates/footer');
            } else {

                /** If You Changes Photos */
                $name_files = date('Ymdhis') . '.jpg';

                if ($_FILES['banner']['size'] != 0) {

                    //upload image
                    $config['upload_path'] = './assets/banner';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
                    $config['max_size'] = '1024';
                    date_default_timezone_set('Asia/Jakarta');
                    $config['file_name']  = $name_files;
                    $config['detect_mime'] = TRUE;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload("banner")) {

                        /* If upload photo succcess */ } else {
                        /* If upload photo failed */ }
                } else {
                    /* if no changes photos */ }


                $data = [];


                if ($_FILES['banner']['size'] != 0) {

                    /** With Photos */
                    $data = array(

                        'posisi' => $this->input->post('posisi'),
                        'banner' => $name_files,
                        'alt' => $this->input->post('alt'),
                        // 'updated_date' => time()
                    );
                    $MyPaths = './assets/banner/' . $this->input->post('old_banner');
                    unlink($MyPaths);
                } else {
                    /** Without Photos */
                    $data = array(
                        'posisi' => $this->input->post('posisi'),
                        'alt' => $this->input->post('alt')
                        // 'updated_date' => time()
                    );
                }



                $id = $this->input->post('id_banner');
                $update = $this->banner_model->update($data, $id);

                $this->session->set_flashdata('message', ' <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Berhasil Mengubah Banner!</h4>
                
              </div>');
                redirect(base_url('admin/banner'));
            }
        }
    }

    public function delete()
    {

        $id = $this->input->get('id');
        $delete = $this->banner_model->delete($id);
        $MyPaths = './assets/banner/' . $this->input->get('pict');
        unlink($MyPaths);
        $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil Menghapus Banner!</h4>
        
      </div>');
        redirect(base_url('admin/banner'));
    }


    public function enable()
    {
        $data = array(

            'aktif' => $this->input->post('status')
        );
        $id = $this->input->post('id_banner');
        $update = $this->banner_model->update($data, $id);


        $this->session->set_flashdata('message', '   <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil Tidak Mengaktifkan Banner!</h4>
        
      </div>');
        redirect(base_url('admin/banner'));
    }

    public function disable()
    {
        $data = array(

            'aktif' => 1,
        );
        $id = $this->input->post('id_banner');
        $update = $this->banner_model->update($data, $id);


        $this->session->set_flashdata('message', '  <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Berhasil Mengaktifkan Banner!</h4>
        
      </div>');
        redirect(base_url('admin/banner'));
    }
}
