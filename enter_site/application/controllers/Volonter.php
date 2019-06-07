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
    
    
    public function __construct() {
        parent::__construct();
        $this->load->library("session");
        
        
        $this->load->model("ModelIzvodjac");
        $this->load->model("ModelTermin");
        $this->load->model("ModelDogadjaj");
        $this->load->model("ModelSlobodniTermini");
    }
    
    public function index() {
         $naredba1="pocetna";
        $this->load->view("volonter/index.php", $naredba1);   
    }

     public function logout(){
        
        $this->session->unset_userdata("volonter");
        $this->session->sess_destroy();
        redirect("Guest/index");
    }
    
}
