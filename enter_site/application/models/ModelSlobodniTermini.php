<?php
// @author Jelena Milojevic  mj140638d@student.etf.bg.ac.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * 
 *
 * @author Jelena
 */
class ModelSlobodniTermini extends CI_Model{

    /**
     * Konstruktor klase.
     */
    public function __construct() {
        parent::__construct();
    }
    
    
    /**
     * Vraca sve slobodne termine iz baze podataka.
     * 
     * @return result
     */

    
    public function dohvSlobodneTermine() {
        $this->db->select('*');
        $this->db->from('termin');
        $this->db->where('rezervisan',0);
        $query=$this->db->get();
        $result = $query->result();
        return $result;
    }
    
     public function dohvPotvTermine() {
        $this->db->select('*');
        $this->db->from('dogadjaj');
        $this->db->where('potvrdjen',1);
        $query=$this->db->get();
        $result = $query->result();
        return $result;
    }
  
    
}
