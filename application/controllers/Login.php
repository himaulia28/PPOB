<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
public function __construct()
{
    parent::__construct();
    $this->load->model('Login_model');
}

public function index()
{
    if($this->session->userdata('Logged_in') == TRUE){

        
        redirect('dashboard');
        
    } else{
        $this->load->view('v_login');
    }
}

public function cek_login(){
    if($this->session->userdata('logged_in') == FALSE){

        $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('password','password','trim|required');

        if($this->form_validation->run() == TRUE){
            if($this->login_model->cek_user() == TRUE){
                
                redirect('dashboard');
                
            } else {
                $this->session->set_flash('notif','Login gagal');
                redirect('login/index');
            }
        } else {
            $this->session->set_flashdata('notif',validation_errors());
            redirect('login/index');
        }

    }else{
        redirect('dashboard/index');
    }
}

public function logout(){
    $this->session->sess_destroy();
    redirect('login');
}
}

?>
