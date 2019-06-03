<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelPoruke
 *
 * @author Dusan
 */
class ModelPoruke extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function dodajPoruku($primalac, $posiljalac, $naslov, $sadrzaj){
        $this->db->set("primalac", $primalac);
        $this->db->set("posiljalac", $posiljalac);
        $this->db->set("naslov", $naslov);
        $this->db->set("sadrzaj", $sadrzaj);
        
        $this->db->insert("poruke");
    }
}
