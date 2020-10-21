<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransactionController extends CI_Controller {

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
        $this->load->library('pagination');
        $this->load->model('Transaction');      
    }

    public function index()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('transactions/index'); //site url
        $config['total_rows'] = $this->db->count_all('transactions'); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
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
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        
        $data['no'] = $data['page'] + 1;
        
 
        $data['data'] = $this->Transaction->getAll($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('admin/transactions/index', $data);
    }

	public function create()
	{
		$this->load->view('admin/transactions/create');
    }
    
    public function import()
    {
        $config['upload_path']   = './uploads/transactions/';
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size']      = 100;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('excel')) {
            $errors = $this->upload->display_errors();
            $this->session->set_flashdata('errors', $errors);
            return redirect('transactions/create');
        }
        $excel = $this->upload->data('full_path');
        $arr_file = explode('.', $excel);
        $extension = end($arr_file);

        if ('xls' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }elseif('xlsx' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }


        $spreadsheet = $reader->load($excel);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $key => $value) {
            //skip row header pertama
            if ($key == 0) {
                continue;
            }

            $product_id = $value[0];
            $trx_date = $value[1];
            $price = $value[2];

            $this->Transaction->insert($product_id, $trx_date, $price);

        }

        $this->session->set_flashdata('message', 'Transactions has been imported');
        return redirect('transactions/index');

    }

}
