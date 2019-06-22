<?php
// @author Vladimir Stefanovic sv140044d@etf.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Model za bazu vezan za Ulogovane korisnike
 * @version 1.0
 * @author Vladimir Stefanovic
 */
class ModelUser extends CI_Model{
    
    /**
     * Konstruktor modela.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelTermin");
        $this->load->model("ModelIzvodjac");
        $this->load->model("ModelTermin");
    }
    
    
    //Dohvata vazne informacije vezane za dogadjaje
    public function dohvDogadjaje() {
        $this->db->select('*');
        $this->db->from('dogadjaj');
        $this->db->where('potvrdjen',1);
        $query=$this->db->get();
        $result = $query->result();
        
        
        
        foreach ($result as $element) {
           $id = $element->terminID;
           $vreme = $this->ModelTermin->dohvatiTVreme($id);
           $datum = $this->ModelTermin->dohvatiTDatum($id);
           
           $element->vreme = $vreme;
           $element->datum = $datum;
        }
        
        return $result;
    }
}