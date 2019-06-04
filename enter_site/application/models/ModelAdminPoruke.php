<?php
// @author Dusan Galic  gd140092d@student.etf.bg.ac.rs
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelAdminPoruke
 * Klasa koja sluzi kao model za poruke namenjene adminu.
 * 
 * @version 1.0
 * @author Dusan
 */
class ModelAdminPoruke extends CI_Model{
    //put your code here
    /**
     * Konstruktor za model adminskih poruka. Nista posebno.
     */
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Dohvata sve redove u tabeli admin_poruke.
     * @return admin_poruke
     */
    public function dohvatiAdminPoruke(){
        $query = $this->db->get('admin_poruke');
        $result = $query->result();
        return $result;
     
    }
    
    /**
     * Brise poruku namenjenu adminu sa datim id-jem.
     * @param int $id
     */
    public function obrisiAdminPoruku($id){        
        $this->db->where("porukaID", $id);
        $this->db->delete("admin_poruke");
 
    } 
    /**
     * Dohvata red iz tabele admin_poruke sa datim id-jem.
     * @param int $id
     * @return admin_poruke
     */
    public function dohvatiAdminPoruku($id){
        $this->db->where("porukaID", $id);
        $query = $this->db->get('admin_poruke');
        return $query->row();
    }
}
