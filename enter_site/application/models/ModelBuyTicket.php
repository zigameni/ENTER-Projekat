<?php
// @author Gazmend Shehu  sg160664d@student.etf.bg.ac.rs
/**
 * Description of ModelBuyTicket
 *  Klasa koja sluzi kao model za kupjenje karte.
 * 
 * @author Dusan
 */
class ModelBuyTicket extends CI_Model{
    
    /**
     * Konstruktor klase.
     */
    public function __construct(){
        parent::__construct();
    }
    
    //---------------------------------------------------------------------
    
    /**
     * Dohvatimo kolicinu preostalih karata.
     * @param $ticketId
     */
    public function getKolicina($ticketId){
        $kolicina = $this->db->select('kolicina')
        ->get_where('karta', array('kartaID' => $ticketId))
        ->row()->kolicina;
        

        return $kolicina;
    }


    /**
     * Dodaje kartu u bazu sa zadatim parametrima.
     * 
     * @param $kartaID
     * @param $username
     * @param $datum
    */
    public function dodajKartu($kartaID, $username, $datum){
        $this->db->set("kartaID", $kartaID);
        $this->db->set("username", $username);
        $this->db->set("datum", $datum);

        $this->db->insert("kupljena_karta");
    }

    public function smanjiKolicinu($ticketID, $kolicina){
        $data = array('kolicina' => $kolicina-1);    
        $this->db->where('kartaID', $ticketID);
        $this->db->update('karta', $data); 
    }
    //---------------------------------------------------------------------





    /**
     * Brise vrstu karte sa zadatim id-jem.
     * 
     * @param int $id
     */
    public function obrisiKartu($id){        
        $this->db->where("kartaID", $id);
        $this->db->delete("karta");
 
    } 
    
    /**
     * Dohvata sve vrste karte iz baze.
     * 
     * @return karta
     */
     public function dohvatiKarte(){
        $query = $this->db->get('karta');
        $result = $query->result();
        return $result;
        
    }
    
    /**
     * Dohvata sve kupljene karte vrste karte ciji je id prosledjen. 
     * Ne znam da li ovo radi, nisam testirao. #samoIskreno
     * 
     * @param int $kartaID
     * @return kupljena_karta
     */
    public function dohvatiKupljeneKarte($kartaID){
        $this->db->where("kartaID", $kartaID);
        $this->db->from("kupljena_karta");
       
        $query = $this->db->get(); 
        $result = $query->result();
        return $result;
    }
   
}
