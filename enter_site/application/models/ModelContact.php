
<?php 

/**
 * Description of ModelPoruke
 * Klasa koja sluzi kao model za poruke u bazi.
 * 
 * @version 1.0
 * @author Gazmend
 */
class ModelContact extends CI_Model{
  /**
   * Konstruktor klase.
   */
  public function __construct() {
      parent::__construct();
  }
  
  /**
   * Dodaje poruku sa datim parametrima u bazu na tabelu poruke_admin.
   * 
   * @param string $email
   * @param string $subject
   * @param string $message
   */
  public function addMessage($email, $subject, $message){
      
      $this->db->set("posiljalac", $email);
      $this->db->set("naslov", $subject);
      $this->db->set("sadrzaj", $message);
      $this->db->insert("admin_poruke");
  }
  
  /**
   * Pita da li korisnik postoji
   * @param $username 
   */
  public function userExists($username){

    $this->db->reset_query();
    $this->db->from('opsti_korisnik');
    $this->db->where("username", $username);

    $query=$this->db->get();
    $row = $query->row();

    if($row!=null){
      return true;
    }else {
      return false;
    }
  }

} // ModelContact







?>