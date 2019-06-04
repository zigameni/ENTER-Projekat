<?php
// @author Dusan Galic  gd140092d@student.etf.bg.ac.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelPoruke
 * Klasa koja sluzi kao model za poruke u bazi.
 * 
 * @version 1.0
 * @author Dusan
 */
class ModelPoruke extends CI_Model{
    //put your code here
    /**
     * Konstruktor klase.
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Dodaje poruku sa datim parametrima u bazu.
     * 
     * @param string $primalac
     * @param string $posiljalac
     * @param string $naslov
     * @param string $sadrzaj
     */
    public function dodajPoruku($primalac, $posiljalac, $naslov, $sadrzaj){
        $this->db->set("primalac", $primalac);
        $this->db->set("posiljalac", $posiljalac);
        $this->db->set("naslov", $naslov);
        $this->db->set("sadrzaj", $sadrzaj);
        
        $this->db->insert("poruke");
    }
}
