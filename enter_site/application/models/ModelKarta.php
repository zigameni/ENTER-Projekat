<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelKarta
 *
 * @author Dusan
 */
class ModelKarta extends CI_Model{
    
    public function __construct(){
        parent::__construct();
    }
    
    public function dodajKartu($naziv, $opis, $cena, $kolicina){
        $this->db->set("naziv", $naziv);
        $this->db->set("opis", $opis);
        $this->db->set("cena", $cena);
        $this->db->set("kolicina", $kolicina);
        
        $this->db->insert("karta");
    }
    
    public function obrisiKartu($id){        
        $this->db->where("kartaID", $id);
        $this->db->delete("karta");
 
    } 
    
     public function dohvatiKarte(){
        $query = $this->db->get('karta');
        $result = $query->result();
        return $result;
        
    }
    
    public function dohvatiKupljeneKarte($kartaID){
        $this->db->where("kartaID", $kartaID);
        $this->db->from("kupljena_karta");
       
        $query = $this->db->get(); 
        $result = $query->result();
        return $result;
    }
   
}
