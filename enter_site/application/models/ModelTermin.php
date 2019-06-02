<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelTermin
 *
 * @author Dusan
 */
class ModelTermin extends CI_Model{

    public function __construct() {
        parent::__construct();
    }
    
    public function dodajTermin($datum, $vreme){
        $this->db->set("datum", $datum);
        $this->db->set("vreme", $vreme);
        $this->db->set("rezervisan", 0);
        
        $this->db->insert("termin");
    }
    
    public function dohvatiTermine(){
        $query = $this->db->get('termin');
        $result = $query->result();
        return $result;
     
    }
    
    public function obrisiTermin($id){        
        $this->db->where("terminID", $id);
        $this->db->delete("termin");
 
    } 
    
    public function rezervisiTermin($id){
    /*    $this->db->where("terminID", $id);
        $this->db->delete("termin"); */
        $this->db->set('rezervisan', 1);
        $this->db->where('terminID', $id);
        $this->db->update('termin');
    }
    
    public function oslobodiTermin($id){
    /*    $this->db->where("terminID", $id);
        $this->db->delete("termin"); */
        $this->db->set('rezervisan', 0);
        $this->db->where('terminID', $id);
        $this->db->update('termin');
    }
    
    public function dohvatiTDatum($id){
        $this->db->where("terminID", $id);
        $this->db->from("termin");
        $query = $this->db->get();
        return $query->row()->datum;
    }
    
    public function dohvatiTVreme($id){
        $this->db->where("terminID", $id);
        $this->db->from("termin");
        $query = $this->db->get();
        return $query->row()->vreme;
    }
    
}
