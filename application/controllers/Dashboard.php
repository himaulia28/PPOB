<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
public function __construct()
 {
    parent::__construct();
    if($this->session->userdata('logged_in')!=true){
        redirect(base_url('index.php/login'),'refresh');
    }
 }

 public function index()
 {
    $data['content_view']="v_dashboard";
    $this->load->view('template',$data,FALSE);
 }
}

?>
