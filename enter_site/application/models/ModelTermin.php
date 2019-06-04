<?php
// @author Dusan Galic  gd140092d@student.etf.bg.ac.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelTermin
 * Klasa koja sluzi kao model za termin u bazi.
 *
 * @author Dusan
 */
class ModelTermin extends CI_Model{

    /**
     * Konstruktor klase.
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Dodaje termin sa datim datumom i vremenom, u bazu podataka.
     * 
     * @param date $datum
     * @param time $vreme
     */
    public function dodajTermin($datum, $vreme){
        $this->db->set("datum", $datum);
        $this->db->set("vreme", $vreme);
        $this->db->set("rezervisan", 0);
        
        $this->db->insert("termin");
    }
    
    /**
     * Vraca sve termine iz baze podataka.
     * 
     * @return termin
     */
    public function dohvatiTermine(){
        $query = $this->db->get('termin');
        $result = $query->result();
        return $result;
     
    }
    
    /**
     * Brise termin sa datim id-jem.
     * 
     * @param int $id
     */
    public function obrisiTermin($id){        
        $this->db->where("terminID", $id);
        $this->db->delete("termin");
 
    } 
    
    /**
     * Rezervise termin sa datim id-jem. Konkretno, polje rezervisan postavlja na 1.
     * 
     * @param int $id
     */
    public function rezervisiTermin($id){
    /*    $this->db->where("terminID", $id);
        $this->db->delete("termin"); */
        $this->db->set('rezervisan', 1);
        $this->db->where('terminID', $id);
        $this->db->update('termin');
    }
    
    /**
     * Oslobadja termin sa datim id-jem. Konkretno, polje rezervisan postavlja na 0.
     * 
     * @param int $id
     */
    public function oslobodiTermin($id){
    /*    $this->db->where("terminID", $id);
        $this->db->delete("termin"); */
        $this->db->set('rezervisan', 0);
        $this->db->where('terminID', $id);
        $this->db->update('termin');
    }
    
    /**
     * Vraca datum od termina koji ima isti terminID kao prosledjeni id.
     * 
     * @param int $id
     * @return date
     */
    public function dohvatiTDatum($id){
        $this->db->where("terminID", $id);
        $this->db->from("termin");
        $query = $this->db->get();
        return $query->row()->datum;
    }
    
    /**
     * Vraca vreme od termina koji ima isti terminID kao prosledjeni id.
     * 
     * @param int $id
     * @return time
     */
    public function dohvatiTVreme($id){
        $this->db->where("terminID", $id);
        $this->db->from("termin");
        $query = $this->db->get();
        return $query->row()->vreme;
    }
    
}
