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
    
    //Pocetna stranica dashboard-a za logovane korisnike
    public function index($naredba1="pocetna") {
         
        $this->load->view("users/index.php", $naredba1);   
    }

    //Unistavanje sesije, standardan logout
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
    //Formira se dinamicki niz koji prikazuje broj i vrstu kupljenih karata po principu punjenja steka
    public function prikazKarata(){
        $karte1 = $this->ModelKarta->dohvatiKarte();
        $naredba1 = "karte1";

        $kupljena = array();
        foreach ($karte1 as $karta){
            $svi_kupci_ove_karte = $this->ModelKarta->dohvatiKupljeneKarte($karta->kartaID);
            foreach ($svi_kupci_ove_karte as $kupac){
                if ($kupac->username == $this->session->userdata('username')) {array_push($kupljena, $karta->kartaID);};
            }
    }
        
        
        $this->load->view("users/index.php",  array('karte1'=>$karte1,'naredba1'=>$naredba1,'kupljene'=>$kupljena)); 
    }
}