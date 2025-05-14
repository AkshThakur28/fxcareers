<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sitemap extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form', 'cookie', 'security']);
        $this->load->library(['pagination', 'session', 'email', 'form_validation', 'encryption']);
        $this->load->model('admin/Sitemap_model', 'Sitemap_model');
        date_default_timezone_set('Asia/Kolkata');
    }

    public function add_sitemap()
    {
        $this->load->view('admin/include/header');
        $this->load->view('admin/sitemap/add_sitemap');
        $this->load->view('admin/include/footer');
    }

    public function sitemap_submit_data()
    {
        $data=[];
        if ($this->input->post()) {
            $data = $this->input->post();
            if ($this->Sitemap_model->sitemap_data_submit($data)) {
                redirect("admin/sitemap/sitemap_view");
            } else {
                $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
                $this->load->view('admin/layout', $data);
            }
        }
    }

    public function sitemap_view()
    {   
        $data['sitemap_view'] = $this->Sitemap_model->sitemap_view();

        $this->load->view('admin/include/header');
        $this->load->view('admin/sitemap/viewsitemap', $data);
        $this->load->view('admin/include/footer');
    }

    public function sitemap_edit($id)
    {
        $id = $this->uri->segment(4);
        $data['viewsitemap'] = $this->Sitemap_model->sitemap_edit($id);
        $this->load->view('admin/include/header');
        $this->load->view('admin/sitemap/edit_sitemap', $data);
        $this->load->view('admin/include/footer');
    }

    public function sitemap_update_data()
    {
        $data=[];
        if ($this->input->post()) {
            $data = $this->input->post();
            if ($this->Sitemap_model->sitemap_update_data($data)) {
                redirect("admin/sitemap/sitemap_view");
            } else {
                $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
                $this->load->view('admin/layout', $data);
            }
        }
    }

    public function sitemap_delete($id)
    {
        $id = $this->uri->segment(4);
        if ($this->Sitemap_model->sitemap_delete($id)) {
            redirect("admin/sitemap/sitemap_view");
        }
    }
}
?>
