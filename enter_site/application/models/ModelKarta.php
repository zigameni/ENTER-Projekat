<?php
// @author Dusan Galic  gd140092d@student.etf.bg.ac.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelKarta
 *  Klasa koja sluzi kao model za kartu iz baze.
 * 
 * @author Dusan
 */
class ModelKarta extends CI_Model{
    
    /**
     * Konstruktor klase.
     */
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * Dodaje kartu u bazu sa zadatim parametrima.
     * 
     * @param string $naziv
     * @param string $opis
     * @param int $cena
     * @param int $kolicina
     */
    public function dodajKartu($naziv, $opis, $cena, $kolicina){
        $this->db->set("naziv", $naziv);
        $this->db->set("opis", $opis);
        $this->db->set("cena", $cena);
        $this->db->set("kolicina", $kolicina);
        
        $this->db->insert("karta");
    }
    
    /**
     * Brise vrstu karte sa zadatim id-jem.
     * 
     * @param int $id
     */
    public function obrisiKartu($id){        
        $this->db->where("kartaID", $id);
        $this->db->delete("karta");
 
    } 
    
    /**
     * Dohvata sve vrste karte iz baze.
     * 
     * @return karta
     */
     public function dohvatiKarte(){
        $query = $this->db->get('karta');
        $result = $query->result();
        return $result;
        
    }
    
    /**
     * Dohvata sve kupljene karte vrste karte ciji je id prosledjen. 
     * Ne znam da li ovo radi, nisam testirao. #samoIskreno
     * 
     * @param int $kartaID
     * @return kupljena_karta
     */
    public function dohvatiKupljeneKarte($kartaID){
        $this->db->where("kartaID", $kartaID);
        $this->db->from("kupljena_karta");
       
        $query = $this->db->get(); 
        $result = $query->result();
        return $result;
    }
   
}
