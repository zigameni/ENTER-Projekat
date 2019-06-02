<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelDogadjaj
 *
 * @author Dusan
 */
class ModelDogadjaj extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function dodajDogadjaj($naziv, $opis, $terminID, $username){
        $this->db->set("naziv", $naziv);
        $this->db->set("opis", $opis);
        $this->db->set("terminID", $terminID);
        $this->db->set("username", $username);
        $this->db->set("potvrdjen", 0);
        
        $this->db->insert("dogadjaj");
    }
    
    public function dohvatiPotvrdjene(){
        $this->db->where("potvrdjen", 1);
        $query = $this->db->get('dogadjaj');
        $result = $query->result();
        return $result;
    }
    
    public function dohvatiZahteve(){
        $this->db->where("potvrdjen", 0);
        $query = $this->db->get('dogadjaj');
        $result = $query->result();
        return $result;
    }
    
     public function obrisiDogadjaj($id){        
        $this->db->where("dogadjajID", $id);
        $this->db->delete("dogadjaj");
 
    } 
    
    public function dohvatiDogadjaj($id){
        $this->db->where("dogadjajID", $id);
        $query = $this->db->get('dogadjaj');
        return $query->row();
    }
    
    public function potvrdiDogadjaj($id){
        $this->db->set('potvrdjen', 1);
        $this->db->where('dogadjajID', $id);
        $this->db->update('dogadjaj');
    }
}
