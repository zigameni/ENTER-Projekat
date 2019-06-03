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
        $this->load->model("ModelKarta");
        $this->load->model("ModelTermin");
        $this->load->model("ModelDogadjaj");
        $this->load->model("ModelAdminPoruke");
        $this->load->model("ModelPoruke");
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
            redirect("Admin/pokaziIzvodjace");
        }
        
    }
    
    public function dohvatiKorisnika($username){
        return $this->ModelIzvodjac->dohvatiKorisnika($username);
    }
        
    public function obrisiIzvodjaca($username){
        $this->ModelIzvodjac->obrisiIzvodjaca($username);
        redirect("Admin/pokaziIzvodjace");
    }
    
    public function pokaziKarte(){
        $karte = $this->ModelKarta->dohvatiKarte();
        $naredba = "karte";

        $this->load->view("admin/slickred/index.php",  array('karte'=>$karte,'naredba'=>"karte")); 
    }
    
    public function obrisiKartu($id){
        $this->ModelKarta->obrisiKartu($id);
        redirect("Admin/pokaziKarte");
    }
    
    public function dodajKar(){
        $this->load->view("admin/dodajKartu.php");    
    }
    
    public function dodajKartu(){
        $this->form_validation->set_rules('naziv','Naziv', 'required');
        $this->form_validation->set_rules('cena','Cena','required');
        $this->form_validation->set_rules('kolicina','Kolicina', 'required');
        $this->form_validation->set_rules('opis','Opis','required');
        $this->form_validation->set_message("required","Polje {field} je ostalo prazno.");
        if($this->form_validation->run()==FALSE){
            //neispravni podaci
            $this->dodajKar();// ne treba redirect jer na refresh treba da proba da opet nesto doda
        }
        else{
            //ispravni podaci
            $this->ModelKarta->dodajKartu($this->input->post('naziv'), $this->input->post('opis'), $this->input->post('cena'), $this->input->post('kolicina'));
            redirect("Admin/pokaziKarte");
        }
    }
    
    public function pokaziTermine(){
        $termini = $this->ModelTermin->dohvatiTermine();
        $naredba = "termini";

        $this->load->view("admin/slickred/index.php",  array('termini'=>$termini,'naredba'=>"termini")); 
    }
    
    public function dodajTer(){
        $this->load->view("admin/dodajTermin.php"); 
    }
    
    public function dodajTermin(){
        $this->form_validation->set_rules('datum','Datum', 'required');
        $this->form_validation->set_rules('vreme','Vreme','required');

        $this->form_validation->set_message("required","Polje {field} je ostalo prazno.");
        if($this->form_validation->run()==FALSE){
            //neispravni podaci
            $this->dodajTer();// ne treba redirect jer na refresh treba da proba da opet nesto doda
        }
        else{
            //ispravni podaci
            $this->ModelTermin->dodajTermin($this->input->post('datum'), $this->input->post('vreme'));
            redirect("Admin/pokaziTermine");
        }
    }
    
    public function obrisiTermin($id){
        $this->ModelTermin->obrisiTermin($id);
        redirect("Admin/pokaziTermine");
    }
    
    public function rezervisiTermin($id){
        $this->ModelTermin->rezervisiTermin($id);
        redirect("Admin/pokaziTermine");
    }
    
    public function pokaziPotvrdjene(){
        $potvrdjeni = $this->ModelDogadjaj->dohvatiPotvrdjene();
        $naredba = "potvrdjeni";
        
        foreach($potvrdjeni as $element){
            $element->datum = $this->ModelTermin->dohvatiTDatum($element->terminID);
            $element->vreme = $this->ModelTermin->dohvatiTVreme($element->terminID);
        }

        $this->load->view("admin/slickred/index.php",  array('potvrdjeni'=>$potvrdjeni,'naredba'=>"potvrdjeni")); 
    }
    
    public function dohvatiTDatum($id){
        $rezultat = $this->ModelTermin->dohvatiTDatum($id);
        echo $rezultat;
    }
    
    public function dohvatiTVreme($id){
        $rezultat = $this->ModelTermin->dohvatiTVreme($id);
        echo $rezultat;
    }
    
    public function obrisiDogadjaj($id){
        $dogadjaj = $this->ModelDogadjaj->dohvatiDogadjaj($id);
        $this->ModelTermin->oslobodiTermin($dogadjaj->terminID);
        
        $this->ModelDogadjaj->obrisiDogadjaj($id);
        redirect("Admin/index");
    }
    
    public function pokaziZahteve(){
        $zahtevi = $this->ModelDogadjaj->dohvatiZahteve();
        $naredba = "zahtevi";
        
        foreach($zahtevi as $element){
            $element->datum = $this->ModelTermin->dohvatiTDatum($element->terminID);
            $element->vreme = $this->ModelTermin->dohvatiTVreme($element->terminID);
        }

        $this->load->view("admin/slickred/index.php",  array('zahtevi'=>$zahtevi,'naredba'=>"zahtevi")); 
    }
    
    public function potvrdiDogadjaj($id){
        $dogadjaj = $this->ModelDogadjaj->dohvatiDogadjaj($id);
        $this->ModelTermin->rezervisiTermin($dogadjaj->terminID);
        
        $this->ModelDogadjaj->potvrdiDogadjaj($id);
        redirect("Admin/pokaziZahteve");
        
    }
    
    public function pokaziAdminPoruke(){
        $adminporuke = $this->ModelAdminPoruke->dohvatiAdminPoruke();
        $naredba = "adminporuke";

        $this->load->view("admin/slickred/index.php",  array('adminporuke'=>$adminporuke,'naredba'=>"adminporuke"));
    }
    
    public function obrisiAdminPoruku(){
        $this->ModelAdminPoruke->obrisiAdminPoruku($id);
        redirect("Admin/pokaziAdminPoruke");
    }
    
    public function odgovoriNaPor($adminporuka){
        $this->load->view("admin/odgovoriNaPoruku.php", array('adminporuka' => $adminporuka));
    }
    
    public function odgovoriNaPoruku($adminporuka){
        $this->form_validation->set_rules('naslov','Naslov','required');
        $this->form_validation->set_rules('sadrzaj','Sadrzaj', 'required');
        
        $this->form_validation->set_message("required","Polje {field} je ostalo prazno.");
        if($this->form_validation->run()==FALSE){
            //neispravni podaci
            $this->odgovoriNaPor($adminporuka);// ne treba redirect jer na refresh treba da proba da opet nesto doda
        }
        else{
            //ispravni podaci
            $rezultat = $this->ModelAdminPoruke->dohvatiAdminPoruku($adminporuka);
            
            $this->ModelPoruke->dodajPoruku($rezultat->posiljalac, NULL, $this->input->post('naslov'), $this->input->post('sadrzaj'));
            
            $this->ModelAdminPoruke->obrisiAdminPoruku($rezultat->porukaID);
            redirect("Admin/pokaziAdminPoruke");
        }
    }
    
}
