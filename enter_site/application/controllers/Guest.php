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
  
  /**
   * This is the main funcion, it will load the pages.
   * @param $page
   */
	public function index($page = 'home')
	{
		//GLOBAL VARIABLES TO SHOW ERRORS
		$_SESSION['errorM'] = '';
		$_SESSION['errorMessage'] ='';

    // Poruka, means that a message was submited, on the Contact page
    if($page == 'poruka'){
      $this->load->model('ModelContact');
      echo "WE MADE IT HERE 1";
      
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        // echo "WE MADE IT HERE AS WELLL 2"; 
        $username     = $_POST['username'];
        $subject      = $_POST['subject'];
        $message      = $_POST['message'];

        // print_r($_POST);
        $this->poruka($username, $subject, $message);
      }
    } else if ( $page  == "tickets"){
      //this model is used to grab the tickets
      $this->load->model('ModelKarta');
      $karte = $this->ModelKarta->dohvatiKarte();

      // --------------------------------------------
      $data['title'] = ucfirst($page);
     
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/pages_header', $data);
      $this->load->view("pages/$page",  array('karte'=>$karte, 'title'=>$data['title']));  
      $this->load->view('templates/footer');
      // --------------------------------------------

     
    } else if ( $page  == "lineup"){
      //this model is used to grab the performers
      $this->load->model('ModelIzvodjac');
      $izvodjaci = $this->ModelIzvodjac->dohvatiIzvodjace();

      // --------------------------------------------
      $data['title'] = ucfirst($page);
     
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
      $this->load->view('templates/pages_header', $data);
      $this->load->view("pages/$page",  array('izvodjaci'=>$izvodjaci, 'title'=>$data['title']));  
      $this->load->view('templates/footer');
      // --------------------------------------------
    }else if ($page  == "guide"){
      $this->guide();
    } else {

      
      //If page does not exist, show a 404 error
      if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
        show_404();
      }
      
      // Prepared data for page Contact
      if($page=="contact"){
        $data  = array (
          "subject" => "", "message" => "",
          "username" => "", "error_m" => "",
          "error_ms" => ""
        );
      }

      $data['title'] = ucfirst($page);
     
      $this->load->view('templates/header', $data);
      $this->load->view('templates/navbar', $data);
  
      if($page=="contact" || $page=="tickets"){
        $this->load->view('templates/pages_header', $data);
      }
      $this->load->view('pages/'.$page, $data);
      $this->load->view('templates/footer');

    }
  } //index


  /**
   * Dodaje poruku na data bazu iz stranice Contact us.
   * @param   $username
   * @param   $subject
   * @param   $message
   */
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


  /**
   * Helper function to load the sub sections of the guide page. 
   * @param $subPage
   */
  public function guide($subPage = "policy"){

    $data['subPage'] = $subPage;
    $data['title'] = ucfirst('guide');

    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);

    $this->load->view('templates/pages_header', $data);
    $this->load->view('pages/'.$data['title'], $data);
    $this->load->view('templates/footer');
  }

  /**
   * Funkcija omogucava kupljenje karte. 
   * @param $ticketID - koju kartu zeli da kupi
   */
  public function buyTicket($ticketID){
    // da li je user signed in?
    if($this->session->userdata('logged_on')=='1' ){
      //buy ticket
      $this->load->model('ModelBuyTicket');

      $kolicina = $this->ModelBuyTicket->getKolicina($ticketID);
      if($kolicina > 0){
        //Dodaj kartu na kupljene karte. 
        $username = $this->session->userdata('username');
        $date = date('y-m-d');
        $this->ModelBuyTicket->dodajKartu($ticketID, $username, $date);

        //smanji kolicinu karata.
        $this->ModelBuyTicket->smanjiKolicinu($ticketID, $kolicina);

      }

      redirect('guest/index/tickets');

    }else {
      echo "this shit dont work";
      redirect('login/login');
    }
    // ako jeste onda moze da kupi kartu

    // ako nije onda samo ga prosledi na sign in. 
  }




} //COntroller