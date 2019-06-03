<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelAdminPoruke
 *
 * @author Dusan
 */
class ModelAdminPoruke extends CI_Model{
    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function dohvatiAdminPoruke(){
        $query = $this->db->get('admin_poruke');
        $result = $query->result();
        return $result;
     
    }
    
    public function obrisiAdminPoruku($id){        
        $this->db->where("porukaID", $id);
        $this->db->delete("admin_poruke");
 
    } 
    
    public function dohvatiAdminPoruku($id){
        $this->db->where("porukaID", $id);
        $query = $this->db->get('admin_poruke');
        return $query->row();
    }
}
