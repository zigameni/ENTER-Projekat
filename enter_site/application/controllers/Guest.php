<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {


  //Loading the home page
	public function index($page = 'home')
	{
		//GLOBAL VARIABLES TO SHOW ERRORS
		$_SESSION['errorM'] = '';
		$_SESSION['errorMessage'] ='';
    //If page does not exist
    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
      show_404();
    }

    $data['title'] = ucfirst($page);
   
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
  } //index
  

  /**
	 * Loguje korisnika odgovarajuce, ili vraca na pocetnu stranicu sa greskom
	 *
	 * @return void
	 */
	public function login(){
		if ($this->input->post('email') == NULL || $this->input->post('password') == NULL)
			return $this->bad_login();
		$user = $this->check($this->input->post('email'), $this->input->post('password'));
		if ($user == NULL)
			$this->bad_login();
		else{
			$this->session->set_userdata(lcfirst($user), 1);
			$this->session->set_userdata('employee', $this->ModelEmployee->getAccount($this->input->post('email'), $user));
			$this->session->set_userdata('account', $this->ModelEmployee->getAccount($this->input->post('email'), 'Account'));
			redirect($user);
		}
  }
  

 









  
} //COntroller
