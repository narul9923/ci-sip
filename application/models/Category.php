<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model {

    private $_table = 'categories';

    public $id;
    public $name;
    public $status;

    public function rules()
    {
        return [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ],

            [
                'field' => 'status',
                'label' => 'Status',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ['id' => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->name = $post['name'];
        $this->status = $post['status'];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->name = $post['name'];
        $this->status = $post['status'];
        return $this->db->update($this->_table, $this, ['id' => $post['id']]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, ['id' => $id]);
    }

}
