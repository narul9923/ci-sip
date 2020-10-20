<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductsController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product');
        $this->load->model('Category');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->library('pagination');

        $category_id = $this->input->get('category_id');
        $search = $this->input->get('search');

        $per_page = 2;
        $config['base_url'] = base_url().'products/index/';
        $config['total_rows'] = $this->Product->num_rows($category_id, $search);
        $config['per_page'] = $per_page;

        $config["uri_segment"]      = 3;
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $config['reuse_query_string'] = TRUE;

        $this->pagination->initialize($config);

        if($this->uri->segment(3)) {
            $page = ($this->uri->segment(3));
        } else {
            $page = 0;
        }

        $data['products'] = $this->Product->paginate($category_id, $search, $per_page, $page);
        $categories = $this->Category->getAll();
        $categories = array_column($categories, 'name', 'id');
        $data['categories'] = array_merge([''=>'All Categories'], $categories);
        $this->load->view('admin/product/index', $data);
    }

    public function create()
    {
        $product = $this->Product;
        $categories = $this->Category->getAll();
        $validation = $this->form_validation;

        $validation->set_rules($product->rules());

        if($validation->run()) {
            // validasi berhasil
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('image')) {
                // jika upload gambar gagal
                $errors = array('errors' => $this->upload->display_errors());
                $this->session->set_flashdata('errors', $errors);

                $image = '';
            } else {
                // jika upload gambar berhasil
                $image = $this->upload->data('file_name');
                $product->save($image);
                $this->session->set_flashdata('success', 'Berhasil disimpan');
                return redirect('products/index','refresh');
            }
        } else if($validation->run() == FALSE) {
            // jika validasi gagal
            $errors = $this->form_validation->error_array();
            // die($errors);
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
        }       

        $categories = array_column($categories, 'name', 'id');
        $this->load->view('admin/product/create', compact('categories'));
    }

    public function show($id = null)
    {
        if (!isset($id)) redirect('products/index');

        $product = $this->Product;

        $data['product'] = $product->get($id);

        if (!$data['product']) show_404();

        $this->load->view('admin/product/show', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('products/index');

        $product = $this->Product;
        $validation = $this->form_validation;
        $data['product'] = $product->get($id);

        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '100';
            $config['max_width'] = '1024';
            $config['max_height'] = '768';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('image')) {
                $errors = array('errors' => $this->upload->display_errors());
                $this->session->set_flashdata('errors', $errors);
                // var_dump($error);
                $image = $data['product']['image'];
            }
            else {
                $image = $this->upload->data('file_name');
                // die('insert success');
                
            }

            $product->update($image);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect('products/index', 'refresh');

        } else if($validation->run() == FALSE) {
            $errors = $this->form_validation->error_array();
            // die($errors);
            $this->session->set_flashdata('errors', $errors);
            $this->session->set_flashdata('input', $this->input->post());
        }

        
        $categories = $this->Category->getAll();
        $data['categories'] = array_column($categories, 'name', 'id');
        if (!$data['product']) show_404();

        $this->load->view('admin/product/edit', $data);

    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        $product = $this->Product;

        if($product->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            return redirect('products/index', 'refresh');
        }
    }

}