<?php
// @author Dusan Galic  gd140092d@student.etf.bg.ac.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelDogadjaj
 * Klasa koja sluzi kao model za dogadjaje iz baze.
 * @version 1.0
 * @author Dusan
 */
class ModelDogadjaj extends CI_Model{
    
    /**
     * Konstruktor modela.
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Dodaje dogadjaj sa datim parametrima u bazu.
     * 
     * @param string $naziv
     * @param string $opis
     * @param int $terminID
     * @param string $username
     */
    public function dodajDogadjaj($naziv, $opis, $terminID, $username){
        $this->db->set("naziv", $naziv);
        $this->db->set("opis", $opis);
        $this->db->set("terminID", $terminID);
        $this->db->set("username", $username);
        $this->db->set("potvrdjen", 0);
        
        $this->db->insert("dogadjaj");
    }
    
    /**
     * Vraca sve dogadjaje iz baze koje je admin odobrio (imaju polje potvrdjen postavljeno na 1)
     * 
     * @return dogadjaj
     */
    public function dohvatiPotvrdjene(){
        $this->db->where("potvrdjen", 1);
        $query = $this->db->get('dogadjaj');
        $result = $query->result();
        return $result;
    }
    
    /**
     * Vraca sve dogadjaje iz baze koje admin nije jos odobrio (imaju polje potvrdjen postavljeno na 0)
     * 
     * @return dogadjaj
     */
    public function dohvatiZahteve(){
        $this->db->where("potvrdjen", 0);
        $query = $this->db->get('dogadjaj');
        $result = $query->result();
        return $result;
    }
    
    /**
     * Brise dogadjaj sa datim id-jem.
     * 
     * @param int $id
     */
     public function obrisiDogadjaj($id){        
        $this->db->where("dogadjajID", $id);
        $this->db->delete("dogadjaj");
 
    } 
    
    /**
     * Vraca dogadjaj sa datim id-jem.
     * 
     * @param int $id
     * @return dogadjaj
     */
    public function dohvatiDogadjaj($id){
        $this->db->where("dogadjajID", $id);
        $query = $this->db->get('dogadjaj');
        return $query->row();
    }
    
    /**
     * Potvrdjuje dogadjaj sa datim id-jem. Tacnije, postavlja polje potvrdjen na 1.
     * 
     * @param int $id
     */
    public function potvrdiDogadjaj($id){
        $this->db->set('potvrdjen', 1);
        $this->db->where('dogadjajID', $id);
        $this->db->update('dogadjaj');
    }
}
