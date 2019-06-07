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

  public function __construct() {
    parent::__construct();
      
  }
  

  //Loading the home page
	public function index($page = 'home')
	{
		//GLOBAL VARIABLES TO SHOW ERRORS
		$_SESSION['errorM'] = '';
		$_SESSION['errorMessage'] ='';

    if($page == 'poruka'){
      $this->load->model('ModelContact');
      echo "WE MADE IT HERE 1";
      
      if($_SERVER["REQUEST_METHOD"] == "POST"){
         echo "WE MADE IT HERE AS WELLL 2"; 
        $username     = $_POST['username'];
        $subject      = $_POST['subject'];
         $message      = $_POST['message'];

         print_r($_POST);
        $this->poruka($username, $subject, $message);
      }
    } else {

      if($page=="contact"){
        $data["subject"] ="";
        $data["message"] = "";
        $data["username"] ="";
        $data['error_m'] = '';
        $data['error_ms'] = '';
         
      }
      //If page does not exist, show a 404 error
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
      }
  
      $data['title'] = ucfirst($page);
     
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
  
      if($page=="contact"){
        $this->load->view('templates/pages_header');
      }
      $this->load->view('pages/'.$page, $data);
      $this->load->view('templates/footer');

    }


    
  } //index

  public function poruka($username, $subject, $message){
      echo "<br>WEEE MADE IT HERE 3 ";
      if($this->ModelContact->userExists($username)){
        $this->ModelContact->addMessage($username, $subject, $message);
        redirect("Guest/index");
        
      } else {
        $page = "contact";
        $data['title'] = 'contact';
        $data['error_m'] = '1';
        $data['error_ms'] = 'Username does not exist!';
        
        $data['title'] = ucfirst($page);
      

        $data['username'] = $username;
        $data['subject'] = $subject;
        $data['message'] = $message;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);

        $this->load->view('templates/pages_header');
          
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
      }


      
    
  

  }//end_poruka

} //COntroller