<?php
// @author Dusan Galic  gd140092d@student.etf.bg.ac.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Admin - controller for all Admin functionalities
 *
 * @author Dusan
 * @version 1.0
 */
class Admin extends CI_Controller{
    
    /**
     * Konstruktor za klasu Admin
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelIzvodjac");
        $this->load->model("ModelKarta");
        $this->load->model("ModelTermin");
        $this->load->model("ModelDogadjaj");
        $this->load->model("ModelAdminPoruke");
        $this->load->model("ModelPoruke");
        $this->load->library("session");
        
    /*    if (($this->session->userdata('korisnik')) == NULL){
            redirect("Guest");
        }
        elseif ($this->session->userdata('izvodjac') != NULL) {
            redirect("Izvodjac");
        }
        elseif (($this->session->userdata('admin')) == NULL) {
            redirect("Korisnik");
        } */ 
        
    }
     
    /**
     *  Poziva pocetnu stranicu i prosledjuje naredbu koja kaze koji sadrzaj se prikazuje u sredini
     */
    public function index(){
        $naredba="pocetna";
        $this->load->view("admin/slickred/index.php", $naredba);     
    }
    
    /**
     *  Izloguje se sa adminskog naloga, preusmeri na pocetnu stranicu kao gost
     */
    public function logout(){
        
        $this->session->unset_userdata("admin");
        $this->session->sess_destroy();
        redirect("Guest/index");
    }
    
    /**
     * Prikazuje izvodjace na adminskoj kontrolnoj tabli, dohvata ih iz baze podataka
     */
    public function pokaziIzvodjace(){
        $izvodjaci1 = $this->ModelIzvodjac->dohvatiIzvodjace();
        $naredba = "izvodjaci";
        $izvodjaci = array();
        foreach ( $izvodjaci1 as $element ){
            $izvodjaci[] = $this->ModelIzvodjac->dohvatiKorisnika($element->username);
        }
        $this->load->view("admin/slickred/index.php",  array('izvodjaci'=>$izvodjaci,'naredba'=>"izvodjaci")); 
    }
    
    /**
     * Pomocna funkcija, zove formu za dodavanje izvodjaca
     */
    public function dodajIzv(){
        $this->load->view("admin/dodajIzvodjaca.php"); 
    }
    
    /**
     * Nakon sto popunjena forma dodajIzvodjaca uradi submit, proverava se validnost podataka;
     * ako ne prodje validaciju, zove formu opet. Ako prodje validaciju, dodaje izvodjaca u bazu.
     */
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
    
    /**
     * 
     * Na osnovu username-a, vraca jedinstvenog korisnika.
     * 
     * @param string $username
     * @return opsti_korisnik
     */
    public function dohvatiKorisnika($username){
        return $this->ModelIzvodjac->dohvatiKorisnika($username);
    }
        
    /**
     * Na osnovu username-a, brise jedinstvenog korisnika.
     * 
     * @param string $username
     */
    public function obrisiIzvodjaca($username){
        $this->ModelIzvodjac->obrisiIzvodjaca($username);
        redirect("Admin/pokaziIzvodjace");
    }
    
    /**
     * Prikazuje vrste karata koje postoje na adminskoj kontrolnoj tabli, dovlaci ih iz baze podataka. 
     */
    public function pokaziKarte(){
        $karte = $this->ModelKarta->dohvatiKarte();
        $naredba = "karte";

        $this->load->view("admin/slickred/index.php",  array('karte'=>$karte,'naredba'=>"karte")); 
    }
    
    /**
     * Brise kartu iz baze sa zadataim id-jem.
     * @param int $id
     */
    public function obrisiKartu($id){
        $this->ModelKarta->obrisiKartu($id);
        redirect("Admin/pokaziKarte");
    }
    
    /**
     * Prikazuje formu za dodavanje karte.
     */
    public function dodajKar(){
        $this->load->view("admin/dodajKartu.php");    
    }
    
    /**
     * Nakon sto forma dodajKartu submit-uje podatke, proverava validnost;
     * ako ne prodje validaciju, opet prikazuje formu. Ako prodje, dodaje u bazu novu vrstu karte.
     */
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
    
    /**
     * Prikazuje termine iz baze podataka na adminskoj kontrolnoj tabli.
     */
    public function pokaziTermine(){
        $termini = $this->ModelTermin->dohvatiTermine();
        $naredba = "termini";

        $this->load->view("admin/slickred/index.php",  array('termini'=>$termini,'naredba'=>"termini")); 
    }
    
    /**
     * Prikazuje formu za dodavanje novih termina u bazu.
     */
    public function dodajTer(){
        $this->load->view("admin/dodajTermin.php"); 
    }
    
    /**
     * Nakon sto forma dodajTermin submit-uje podatke, proverava validnost;
     * ako ne prodje validaciju, opet prikazuje formu. Ako prodje, dodaje u bazu nov termin.
     */
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
    
    /**
     * Za datu vrednost id-ja, brise jedinstven termin sa tim id-jem iz baze.
     * @param int $id
     */
    public function obrisiTermin($id){
        $this->ModelTermin->obrisiTermin($id);
        redirect("Admin/pokaziTermine");
    }
    
    /**
     * Za datu vrednost id-ja, rezervise termin sa tim id-jem tako sto mu vrednost rezervisan stavlja na 1.
     * @param int $id
     */
    public function rezervisiTermin($id){
        $this->ModelTermin->rezervisiTermin($id);
        redirect("Admin/pokaziTermine");
    }
    
    /**
     * Prikazuje dogadjaje koji su odobreni od strane admina na kontrolnoj tabli.
     */
    public function pokaziPotvrdjene(){
        $potvrdjeni = $this->ModelDogadjaj->dohvatiPotvrdjene();
        $naredba = "potvrdjeni";
        
        foreach($potvrdjeni as $element){
            $element->datum = $this->ModelTermin->dohvatiTDatum($element->terminID);
            $element->vreme = $this->ModelTermin->dohvatiTVreme($element->terminID);
        }

        $this->load->view("admin/slickred/index.php",  array('potvrdjeni'=>$potvrdjeni,'naredba'=>"potvrdjeni")); 
    }
    
    /**
     * Dohvati datum od termina koji ima terminID jednak parametru id.
     * @param int $id
     */
    public function dohvatiTDatum($id){
        $rezultat = $this->ModelTermin->dohvatiTDatum($id);
        echo $rezultat;
    }
    
    /**
     * Dohvati vreme od termina koji ima terminID jednak parametru id.
     * @param int $id
     */
    public function dohvatiTVreme($id){
        $rezultat = $this->ModelTermin->dohvatiTVreme($id);
        echo $rezultat;
    }
    
    /**
     * Obrise dogadjaj sa datim id-jem. Prethodno mora da oslobodi termin koji je zauzimao.
     * @param int $id
     */
    public function obrisiDogadjaj($id){
        $dogadjaj = $this->ModelDogadjaj->dohvatiDogadjaj($id);
        $this->ModelTermin->oslobodiTermin($dogadjaj->terminID);
        
        $this->ModelDogadjaj->obrisiDogadjaj($id);
        redirect("Admin/index");
    }
    
    /**
     * Prikazuje zahteve pristigle od izvodjaca koji jos uvek nisu potvrdjeni dogadjaji.
     */
    public function pokaziZahteve(){
        $zahtevi = $this->ModelDogadjaj->dohvatiZahteve();
        $naredba = "zahtevi";
        
        foreach($zahtevi as $element){
            $element->datum = $this->ModelTermin->dohvatiTDatum($element->terminID);
            $element->vreme = $this->ModelTermin->dohvatiTVreme($element->terminID);
        }

        $this->load->view("admin/slickred/index.php",  array('zahtevi'=>$zahtevi,'naredba'=>"zahtevi")); 
    }
    
    /**
     * Kada admin potvrdjuje dogadjaj sa datim id-jem, vrednost polja potvrdjen postaje 1, a i 
     * termin u kom je taj dogadjaj mora biti rezervisan.
     * @param int $id
     */
    public function potvrdiDogadjaj($id){
        $dogadjaj = $this->ModelDogadjaj->dohvatiDogadjaj($id);
        $this->ModelTermin->rezervisiTermin($dogadjaj->terminID);
        
        $this->ModelDogadjaj->potvrdiDogadjaj($id);
        redirect("Admin/pokaziZahteve");
        
    }
    
    /**
     * Pokazuje poruke poslate adminu od strane korisnika. 
     */
    public function pokaziAdminPoruke(){
        $adminporuke = $this->ModelAdminPoruke->dohvatiAdminPoruke();
        $naredba = "adminporuke";

        $this->load->view("admin/slickred/index.php",  array('adminporuke'=>$adminporuke,'naredba'=>"adminporuke"));
    }
    
    /**
     * Brise poruku posatu administratoru.
     */
    public function obrisiAdminPoruku($id){
        $this->ModelAdminPoruke->obrisiAdminPoruku($id);
        redirect("Admin/pokaziAdminPoruke");
    }
    
    /**
     * Dobija parametar koji je zapravo id od poruke namenjenoj adminu. 
     * Zove formu od koje dobija ostale podate neophodne za slanje odgovora na poruku.
     * @param int $adminporuka
     */
    public function odgovoriNaPor($adminporuka){
        $this->load->view("admin/odgovoriNaPoruku.php", array('adminporuka' => $adminporuka));
    }
    
    /**
     * Dobija parametar koji je zapravo id od poruke namenjenoj adminu.
     * Validira podatke dobijene iz forme, vraca na formu ako padne validaciju. 
     * Posle uspesnog validiranja dodaje novu poruku u bazu.
     * @param int $adminporuka
     */
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
