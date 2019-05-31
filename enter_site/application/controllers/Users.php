<?php

/**
 *
 */
class Users extends CI_Controller{

  public function index ($page = 'register'){
    //We check if the user is signed in

    //the variables that we want to pass into the views
    $data['title'] = ucfirst($page);

    //now we want to load the parts of the page:
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);


    $this->load->view('users/'.$page, $data);
    $this->load->view('templates/footer');
  }


  public function register(){
    $data['title'] = "Register";

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('users/register', $data);

    $this->load->view('templates/footer');
  }

  public function login(){
    $data['title'] = "Login";

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('users/login', $data);

    $this->load->view('templates/footer');
  }

}





 ?>
