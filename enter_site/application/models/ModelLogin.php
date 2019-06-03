<?php

class ModelLogin extends CI_Model{
  /**
   * Constructs model
   */    
  public function __construct() {
      parent::__construct();
  }


    /**
     * Dohvata nalog preko $username,
     *
     * @param String $username
     * @param String 
     * @return object
     */
    /* 
    public function getAccount($username){
      $this->db->reset_query();
      $query = $this->db->where("username", $username);
      // $query=$this->db->get($tip);
      $result = $query->row();
      return $result;
  }
  */

  //Fetch user 
  public function fetchUser($email){
    $this->db->reset_query();
    //$this->db->select('*');
    $this->db->from('opsti_korisnik');
    $this->db->where("email", $email);
    $query=$this->db->get();
    
    $row = $query->row();

    return $row;
  }

  public function isType($username, $table){
    $this->db->reset_query();
    $this->db->from($table);
    $this->db->where("username", $username);
    $query=$this->db->get();
    $row = $query->row();
    return $row;
  }

  // Register User, (insert data into the table)
  public function insertUser($data1=[]){
    
    $username= $data1['user_name'];
    $password= $data1['password'];
    $ime= $data1['first_name'];
    $prezime= $data1['last_name'];
    $adresa= $data1['address'];
    $grad= $data1['city'];
    $drzava= $data1['country'];
    $email= $data1['email'];
    $active= '1';
    
    $query="insert into opsti_korisnik values('$username','$password','$ime','$prezime','$adresa','$grad','$drzava','$email','', $active)";
    $this->db->query($query);
    /*
    $data = array(
      'username'=> $data1['user_name'] ,
      'password'=> $data1['password'],
      'ime'=> $data1['first_name'],
      'prezime'=> $data1['last_name'],
      'adresa'=> $data1['address'],
      'grad'=> $data1['city'],
      'drzava'=> $data1['country'],
      'email'=> $data1['email'],
      'active'=> '1',
    );

    */


    
    
  
   //$this->db->insert('opsti_korisnik', $data);


  }





} // ModelUser