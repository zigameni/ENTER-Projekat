<?php
// @author Jelena Milojevic  mj140638d@student.etf.bg.ac.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Controller for all Performer functionalities
 *
 * @author Jelena
 */
class Performer extends CI_Controller {
    
    /** 
    Konstruktor  za klasu izvodjac, ucitava potrebne parametre
     *     
     */
    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        
        
        $this->load->model("ModelIzvodjac");
        $this->load->model("ModelTermin");
        $this->load->model("ModelDogadjaj");
        $this->load->model("ModelSlobodniTermini");
    }
    
    /** 
    Funkcija za ucitavanje pocetne strane i sadrzaja na njoj
     *     
     */
    
    public function index() {
         $naredba1="pocetna";
        $this->load->view("performer/index.php", $naredba1);   
    }
    
    
    /** 
    Funkcija za odjavljivanje korisnika
     *     
     */

     public function logout(){
        
        $this->session->unset_userdata("performer");
        $this->session->sess_destroy();
        redirect("Guest/index");
    }
    
    
    /** 
    Funkcija koja dohvata slobodne termine iz baze i prosledjuje ih
     *     
     */
    public function slobodniTermini(){
        $termini1 = $this->ModelSlobodniTermini->dohvSlobodneTermine();
        $naredba1 = "termini1";

        $this->load->view("performer/index.php",  array('termini1'=>$termini1,'naredba1'=>"termini1")); 
    }
    
    /** 
    Funkcija koja dohvata i prosledjuje odobrene zahteve
     *     
     */
    public function odobreniZahtevi() {
        $potvrdjeni1 = $this->ModelDogadjaj->dohvatiPotvrdjene();
        $naredba1 = "potvrdjeni1";
        
        foreach($potvrdjeni1 as $element){
            $element->datum = $this->ModelTermin->dohvatiTDatum($element->terminID);
            $element->vreme = $this->ModelTermin->dohvatiTVreme($element->terminID);
        }

        $this->load->view("performer/index.php",  array('potvrdjeni1'=>$potvrdjeni1,'naredba1'=>"potvrdjeni1")); 
    }
    
    /** 
    Funkcija koja zove formu za dodavanje dogadjaja - pomocna
     *     
     */
    public function dodajDogg(){
        $this->load->view("performer/dodajEvent.php"); 
    }
    
    
    /** 
    Funkcija koja dodaje novi dogadjaj
     *     
     */
    
    public function dodajDog(){
        $this->form_validation->set_rules('naziv','Naziv', 'required');
        $this->form_validation->set_rules('opis','Opis','required');
        $this->form_validation->set_rules('terminId','id', 'required');
        $this->form_validation->set_rules('username','user','required');
        if($this->form_validation->run()==FALSE){
            //neispravni podaci
            $this->dodajDogg();// ne treba redirect jer na refresh treba da proba da opet nesto doda
        }
        else{
            //ispravni podaci
            $this->ModelDogadjaj->dodajDogadjaj($this->input->post('naziv'), $this->input->post('opis'),
            $this->input->post('terminId'), $this->input->post('username'));
            redirect("Performer/index");
        }
        
    }
    
    
    
}
