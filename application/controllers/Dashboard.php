<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','Anda wajib melakukan login terlebih dahulu');
            redirect('');
        };
        $this->load->model('MyModel');
    }

    function index(){
        $data=array(
            'title'=>'Dashboard',
            'active_dashboard'=>'active',
            'dt_contact'=>$this->MyModel->getAllData('contact'),
        );
        $this->load->view('element/header',$data);
        $this->load->view('pages/v_dashboard');
        $this->load->view('element/footer');
    }

}