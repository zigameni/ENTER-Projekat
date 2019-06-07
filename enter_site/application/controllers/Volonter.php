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
class Volonter extends CI_Controller {
    
   
    /** 
    Konstruktor za klasu volontera, ucitava potrebne podatke
     *     
     */
    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        
        
        $this->load->model("ModelIzvodjac");
        $this->load->model("ModelTermin");
        $this->load->model("ModelDogadjaj");
        $this->load->model("ModelSlobodniTermini");
        $this->load->model("ModelVolontira");
    }
    
    /** 
    Funkcija za otvaranje pocetne stranice i sadrzaja na njoj
     *     
     */
    public function index() {
         $naredba1="pocetna";
        $this->load->view("volonter/index.php", $naredba1);   
    }

    /** 
    Funkcija za odjavljivanje korisnika
     *     
     */
     public function logout(){
        
        $this->session->unset_userdata("volonter");
        $this->session->sess_destroy();
        redirect("Guest/index");
    }
    
    /** 
    Funkcija koja vraca slobodne termine i prosledjuje ih za ispis
     *     
     */
    public function slobodniTermini(){
        $mesta = $this->ModelSlobodniTermini->dohvPotvTermine();
        $naredba1 = "mesta";
        $this->load->view("volonter/index.php",  array('mesta'=>$mesta,'naredba1'=>"mesta"));    
    }
    
   /** 
     Funkcija za otvaranje forme
     *     
     */
     public function dodajVolo(){
        $this->load->view("volonter/dodajSe.php"); 
    }
    
    /** 
    Funkcija za prijavu volontera na neki dogadjaj
     *     
     */
    public function dodajVol(){
        $this->form_validation->set_rules('dogadjajId','dogId', 'required');
        $this->form_validation->set_rules('terminId','terId','required');
        $this->form_validation->set_rules('username','username', 'required');
        if($this->form_validation->run()==FALSE){
            //neispravni podaci
            $this->dodajVolo();// ne treba redirect jer na refresh treba da proba da opet nesto doda
        }
        else{
            //ispravni podaci
            $br=$this->ModelVolontira->rezervisi($this->input->post('dogadjajId'), $this->input->post('terminId'),
            $this->input->post('username'));
            redirect("Volonter/index");
        }
        
    }
    
    /** 
    Funkcija za dohvatanje i ispis potvrdjenih zahteva za volontiranje
     *     
     */
    public function odobreniZahtevi() {
         $potvrdjeni1 = $this->ModelVolontira->dohvatiPrijavljene();
        $naredba1 = "potvrdjeni";
        $this->load->view("volonter/index.php",  array('potvrdjeni1'=>$potvrdjeni1,'naredba1'=>"potvrdjeni1"));    
    }
    
}
