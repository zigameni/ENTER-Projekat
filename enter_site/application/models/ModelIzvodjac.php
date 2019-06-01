<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelIzvodjac
 *
 * @author Dusan
 */
class ModelIzvodjac extends CI_Model{
    //put your code here
    public $izvodjac;
    
    public function __construct(){
        parent::__construct();
        $this->izvodjac = NULL;
    }
    
    public function dodajIzvodjaca($username, $password, $name, $lastname, $address, $city, $state, $email){
        $this->db->set("username", $username);
        $this->db->set("password", $password);
        $this->db->set("ime", $name);
        $this->db->set("prezime", $lastname);
        $this->db->set("adresa", $address);
        $this->db->set("grad", $city);
        $this->db->set("drzava", $state);
        $this->db->set("email", $email);
        $this->db->insert("opsti_korisnik");
        
        $this->db->set("username", $username);
        $this->db->insert("izvodjac");
    }
    
    public function obrisiIzvodjaca($username){
        $username = str_replace('%20', ' ', $username);
        
        $this->db->where("username", $username);
        $this->db->delete("izvodjac");
        
        $this->db->where("username", $username);
        $this->db->delete("opsti_korisnik");
       
    }
    
    public function dohvatiKorisnika($username){
        $this->db->where("username", $username);
        $this->db->from("opsti_korisnik");
        $query = $this->db->get();
        return $query->row();
    }
    
    public function dohvatiIzvodjace(){
        $query = $this->db->get('izvodjac');
        $result = $query->result();
        return $result;
        
    }
}
