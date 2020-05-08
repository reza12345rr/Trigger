<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('m_account'); //call model
    }

    public function index(){
        $dariDB = $this->m_account->cekuid();
        $nourut = substr($dariDB, 4, 5);
        $uidSekarang = $nourut + 1;
        $data['users_id'] = $uidSekarang;
        $this->load->view('registerv',$data);
        $this->form_validation->set_rules('username', 'USERNAME','required');
        $this->form_validation->set_rules('email','EMAIL','required|valid_email');
        $this->form_validation->set_rules('password','PASSWORD','required');
        $this->form_validation->set_rules('password_conf','PASSWORD','required|matches[password]');
        
        if($this->form_validation->run() == FALSE) {
            $data['errors'] = $this->session->display_errors('<p>', '</p>');
            $this->load->view('registerv',$data);
        }else{
            $this->regis();
        }
    }
    public function FunctionName(Type $var = null)
    {
        # code...
    }
    private function regis()
    {
            $data['users_id'] = $this->input->post('usid');
            $data['email']  = $this->input->post('email');
            $data['username'] = $this->input->post('username');
            $data['password'] = md5($this->input->post('password'));
            $data['role'] = "1";
            $this->m_account->daftar($data);
            $pesan['message'] = "Pendaftaran berhasil";
            $this->load->view('suksesv',$pesan);
        
    }
}
?>