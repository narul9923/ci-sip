<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Model {

    private $_table = 'transactions';

    public function getAll($limit, $start)
    {
        $this->db->select('t.*, p.name name_product');
        $this->db->from($this->_table.' t');
        $this->db->join('products p', 't.product_id = p.id');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }


    public function insert($product_id, $trx_date, $price)
    {
        $data = [
            'product_id' => $product_id,
            'trx_date' => $trx_date,
            'price' => $price,
        ];

        $success = $this->db->insert($this->_table, $data);
    
    }

}
