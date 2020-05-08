<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }
    
    public function index(){
        // Query Last Month
        $qry=  $this->db->query('SELECT DATE_SUB(CURDATE(),INTERVAL 1 MONTH) as last');
        $hasil = $qry->row();
        // Query total product as offset
        $que = $this->db->query("SELECT COUNT(product_id) as count FROM products");
        $res = $que->row();
        
        $data['title'] = "Freuz E-Shop";
        $data['username'] = $this->session->userdata('username');
        $data['cat'] = $this->m_user->getAllCategory();
        $data['prod'] = $this->m_user->getAllProducts();
        $data['brand'] = $this->m_user->getAllVendor();
        $data['lastmonth'] = $hasil->last;
        $data['count'] = $res->count;
        $data['latest'] = $this->m_user->getLatestProduct();
        $this->load->view('template/home_header', $data);
        $this->load->view('template/home_topbar', $data);
        $this->load->view('template/home_menu');
        $this->load->view('index',$data);
        $this->load->view('template/home_footer');
    }
}
?>