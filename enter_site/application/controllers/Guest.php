<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// @author Gazmend Shehu  sg160664d@student.etf.bg.ac.rs
/**
 * Guest - controller for Guest functionalities
 *
 * @author Gazmend
 * @version 1.0
 */
class Guest extends CI_Controller {


  //Loading the home page
	public function index($page = 'home')
	{
		//GLOBAL VARIABLES TO SHOW ERRORS
		$_SESSION['errorM'] = '';
		$_SESSION['errorMessage'] ='';

    //If page does not exist, show a 404 error
    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
      show_404();
    }

    $data['title'] = ucfirst($page);
   
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');
  } //index

} //COntroller
