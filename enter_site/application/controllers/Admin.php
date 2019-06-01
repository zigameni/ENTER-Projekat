<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author Dusan
 */
class Admin extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelIzvodjac");
        $this->load->library("session");
        
  /*      if (($this->session->userdata('korisnik')) == NULL){
            redirect("Gost");
        }
        elseif ($this->session->userdata('izvodjac') != NULL) {
            redirect("Izvodjac");
        }
        elseif (($this->session->userdata('admin')) == NULL) {
            redirect("Korisnik");
        }  */
        
    }
        
    public function index(){
        $naredba="pocetna";
        $this->load->view("admin/slickred/index.php", $naredba);     
    }
    
    public function logout(){
        
        $this->session->unset_userdata("admin");
        $this->session->sess_destroy();
        redirect("Gost");
    }
    
    public function pokaziIzvodjace(){
        $izvodjaci1 = $this->ModelIzvodjac->dohvatiIzvodjace();
        $naredba = "izvodjaci";
        $izvodjaci = array();
        foreach ( $izvodjaci1 as $element ){
            $izvodjaci[] = $this->ModelIzvodjac->dohvatiKorisnika($element->username);
        }
        $this->load->view("admin/slickred/index.php",  array('izvodjaci'=>$izvodjaci,'naredba'=>"izvodjaci")); 
    }
    
    public function dodajIzv(){
        $this->load->view("admin/dodajIzvodjaca.php"); 
    }
    
    public function dodajIzvodjaca(){
        $this->form_validation->set_rules('username','Username', 'required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('name','Name', 'required');
        $this->form_validation->set_rules('lastname','Lastname','required');
        $this->form_validation->set_rules('email','Email', 'required');
        $this->form_validation->set_message("required","Polje {field} je ostalo prazno.");
        if($this->form_validation->run()==FALSE){
            //neispravni podaci
            $this->dodajIzv();// ne treba redirect jer na refresh treba da proba da opet nesto doda
        }
        else{
            //ispravni podaci
            $this->ModelIzvodjac->dodajIzvodjaca($this->input->post('username'), $this->input->post('password'), $this->input->post('name'), $this->input->post('lastname'),
            $this->input->post('address'), $this->input->post('city'), $this->input->post('state'), $this->input->post('email'));
            redirect("Admin/index");
        }
        
    }
    
    public function dohvatiKorisnika($username){
        return $this->ModelIzvodjac->dohvatiKorisnika($username);
    }
        
    public function obrisiIzvodjaca($username){
        $this->ModelIzvodjac->obrisiIzvodjaca($username);
        redirect("Admin/pokaziIzvodjace");
    }
    
    //put your code here
    
}
