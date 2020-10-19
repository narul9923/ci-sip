<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriesController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Category');   
        $this->load->library('form_validation');   
    }


	public function index()
	{
        $data['categories'] = $this->Category->getAll();
        $this->load->view('admin/categories/index', $data);
	}

    public function create()
    {
        $category = $this->Category;
        $validation = $this->form_validation;

        $validation->set_rules($category->rules());

        if ($validation->run()) {
            $category->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            return redirect('categories/index', 'refresh');
        }

        $this->load->view('admin/categories/create');
    }

    public function show($id = null)
    {
        if (!isset($id)) redirect('categories/index');

        $category = $this->Category;

        $data['category'] = $category->getById($id);

        if (!$data['category']) show_404();

        $this->load->view('admin/categories/show', $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('categories/index');

        $category = $this->Category;
        $validation = $this->form_validation;

        $validation->set_rules($category->rules());

        if ($validation->run()) {
            $category->update();
            $this->session->set_flashdata('success', 'Berhasil diupdate');
            return redirect('categories/index', 'refresh');
        }

        $data['category'] = $category->getById($id);

        if (!$data['category']) show_404();

        $this->load->view('admin/categories/edit', $data);

    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();
        
        $category = $this->Category;

        if ($category->delete($id)) {
            $this->session->set_flashdata('success', 'Berhasil dihapus');
            return redirect('categories/index', 'refresh');
        }
    }
}
