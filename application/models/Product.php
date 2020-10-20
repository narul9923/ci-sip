<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

    private $_table = 'products';

    public $id;
    public $category_id;
    public $name;
    public $description;
    public $price;
    public $sku;
    public $image;
    public $status;

    public function rules()
    {
        return [
            [
                'field' => 'category_id',
                'label' => 'Category',
                'rules' => 'required',
            ],

            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Nama Harus diisi.',
                ),
            ],

            [
                'field' => 'description',
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'Deskripsi harus diisi',
                ),
            ],

            [
                'field' => 'price',
                'label' => 'Price',
                'rules' => 'required'
            ],
            [
                'field' => 'sku',
                'label' => 'Sku',
                'rules' => 'required'
            ],
            [
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required'
            ],
        ];
    }

    public function get_all()
    {
        $this->db->select('p.*, c.name category_name');
        $this->db->from($this->_table. ' p');
        $this->db->join('categories c', 'p.category_id = c.id');
        return $this->db->get()->result_array();
    }

    public function num_rows($category_id, $search) 
    {
        $this->db->from($this->_table.' p');
        $this->db->join('categories c', 'p.category_id = c.id');

        if(!empty($category_id)) {
            $this->db->where('c.id', $category_id);
        }

        if(!empty($search)) {
            $this->db->where('p.name', $search);
        }

        return $this->db->get()->num_rows();
    }
    
    public function paginate($category_id, $search, $num_item, $page)
    {
        $this->db->select('p.*, c.name category_name');
        $this->db->from($this->_table.' p');
        $this->db->join('categories c', 'p.category_id = c.id');

        if(!empty($category_id)) {
            $this->db->where('c.id', $category_id);
        }

        if(!empty($search)) {
            $this->db->where('p.name', $search);
        }

        $this->db->limit($num_item, $page);
        return $this->db->get()->result_array();
    }

    public function save($image)
    {
        $post = $this->input->post();
        $this->category_id = $post['category_id'];
        $this->name = $post['name'];
        $this->description = $post['description'];
        $this->price = $post['price'];
        $this->sku = $post['sku'];
        $this->image = $image;
        $this->status = $post['status'];
        return $this->db->insert($this->_table, $this);
    }

    public function update($image)
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->category_id = $post['category_id'];
        $this->name = $post['name'];
        $this->description = $post['description'];
        $this->price = $post['price'];
        $this->sku = $post['sku'];
        $this->image = $image;
        $this->status = $post['status'];
        return $this->db->update($this->_table, $this, ['id' => $post['id']]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }

    public function get($id)
    {
        $this->db->select('p.*, c.name category_name');
        $this->db->from($this->_table. ' p');
        $this->db->join('categories c','p.category_id = c.id');
        $this->db->where('p.id', $id);
        return $this->db->get($this->_table)->row_array();
    }

}