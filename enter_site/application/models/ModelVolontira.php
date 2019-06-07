<?php
// @author Jelena Milojevic  mj140638d@student.etf.bg.ac.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Model za bazu kod prijave volontera
 * @version 1.0
 * @author Jelena
 */
class ModelVolontira extends CI_Model{
    
    /**
     * Konstruktor modela.
     */
    public function __construct() {
        parent::__construct();
        $this->load->model("ModelDogadjaj");
    }
    
    public function dodeliMesta() {
         $this->db->select('*');
        $this->db->from('termin');
        $this->db->where('rezervisan',1);
        $query=$this->db->get();
        $result = $query->result();
        $niz= array();
        $broj=3;
        foreach ($result as $element) {
           $id=$element->terminID;
           $niz+= array($id=>$broj);
        }
       return $niz;
    }
    
    public function rezervisi($dogId,$terId,$user) {
         $niz=$this->dodeliMesta();
     
         if ($niz[$terId]>0) {
             $niz[$terId]--;
        $this->db->set("username", $user);
        $this->db->set("dogadjajID", $dogId);
        $this->db->insert("volontira");
         }
    }
    
    public function dohvatiPrijavljene() {
         $this->db->select('*');
        $this->db->from('volontira');
        $query=$this->db->get();
        $result = $query->result();
        return $result;
    }
    
    
    
}
