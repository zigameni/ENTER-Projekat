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
}
