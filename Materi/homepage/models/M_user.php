<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

public function __construct()
{
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
}

public function getAllProducts()
    {
        $this->db->select('*'); // <-- There is never any reason to write this line!
        $this->db->from('products');
        $this->db->join('category', 'products.product_category = category.category_id');
        $query=$this->db->get();
        return $query->result_array();
    }
public function getAllCategory()
{
    $this->db->select('*');
    $this->db->from('category');
    $this->db->order_by('category_id', 'asc');
    $qry=$this->db->get();
    return $qry->result_array();
}

public function getAllVendor()
{
    $this->db->select('*');
    $this->db->from('vendor');
    $this->db->order_by('vendor_name', 'asc');
    $qry=$this->db->get();
    return $qry->result_array();
}

public function getProductCategory($id)
{
    $this->db->select('*');
    $this->db->where('category.category_id', $id); // <-- There is never any reason to write this line!
    $this->db->from('products');
    $this->db->join('category', 'products.product_category = category.category_id');
    $query=$this->db->get();
    return $query->result_array();
}

public function getProductVendor($id)
{
    $this->db->select('*');
    $this->db->where('vendor.product_vendor', $id); // <-- There is never any reason to write this line!
    $this->db->from('products');
    $this->db->join('vendor', 'products.product_vendor = vendor.vendor_id');
    $query=$this->db->get();
    return $query->result_array();
}

public function getTotalProductVendor($id)
{
    $this->db->query("SELECT COUNT(product_name) as pn FROM products JOIN vendor WHERE product_vendor=vendor_id AND vendor_id = '$id';");
    $qry = $this->db->get();
    return $qry->result_array();
}

public function getLatestProduct()
{
    $query = $this->db->query("SELECT DISTINCT jenis, tanggal,product_name,product_image,product_price FROM log JOIN products WHERE tanggal = (SELECT MAX(tanggal)) AND products.product_id=log.jenis GROUP BY jenis ORDER BY tanggal DESC;");
    return $query->result_array();
}

}
/* End of file M_user.php */

?>