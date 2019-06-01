<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {


  //Loading the home page
	public function index($page = 'home')
	{

    //If page does not exist
    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
      show_404();
    }

    $data['title'] = ucfirst($page);
   
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
  }
  
  
}
