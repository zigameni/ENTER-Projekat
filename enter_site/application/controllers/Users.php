<?php
// @author Vladimir Stefanovic sv140044d@etf.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controller for all User functionalities
 *
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

public function __construct() {
        parent::__construct();
        $this->load->library("session");
        
        
        $this->load->model("ModelUser");
        $this->load->model("ModelTermin");
        $this->load->model("ModelKarta");
    }
    
    public function index() {
         $naredba1="pocetna";
        $this->load->view("users/index.php", $naredba1);   
    }

     public function logout(){
        
        $this->session->unset_userdata("user");
        $this->session->sess_destroy();
        redirect("Guest/index");
    }
    
    //Kontroler koji prikazuje informacije dogadjaja
    public function prikazDogadjaja(){
        $dogadjaji1 = $this->ModelUser->dohvDogadjaje();
        $naredba1 = "dogadjaji1";

        $this->load->view("users/index.php",  array('dogadjaji1'=>$dogadjaji1,'naredba1'=>$naredba1)); 
    }
    
    //Kontroler koji prikazuje informacije o kartama
    public function prikazKarata(){
        $karte1 = $this->ModelKarta->dohvatiKarte();
        $naredba1 = "karte1";

        $this->load->view("users/index.php",  array('karte1'=>$karte1,'naredba1'=>$naredba1)); 
    }
    
    public function kupovinaKarte(){
        $kupovina1 = $this->ModelUser->kupiKartu();
        $naredba1 = "kupovina1";

        $this->load->view("users/index.php",  array('kupovina1'=>$kupovina1,'naredba1'=>$naredba1)); 
    }
}