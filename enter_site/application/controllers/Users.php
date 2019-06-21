<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {


  public function register(){

    //check for post 
    if($_SERVER['REQUEST_METHOD']=='POST'){
      // Process form
    } else {
      // LOAD FORM
      $data =[
        'name' => '',
         
      ];
      $page = "register";
      $data['title'] = ucfirst($page);
      
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('users/'.$page, $data);
      $this->load->view('templates/footer');
      echo 'load form';
    }

  }

/**
 
  Loading the home page
	public function index($page = 'register')
	{


    //If page does not exist
    if(!file_exists(APPPATH.'views/users/'.$page.'.php')){
      show_404();
    }

    $data['title'] = ucfirst($page);
   
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('users/'.$page, $data);
    $this->load->view('templates/footer');
  }
 
 */

  
  
}