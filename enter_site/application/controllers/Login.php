<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// @author Gazmend Shehu  sg160664d@student.etf.bg.ac.rs
/**
 * Login - controller for all Login/Register functionalities
 *
 * @author Gazmend
 * @version 1.0
 */
class Login extends CI_Controller {

  //CONSTRUCTOR
  public function __construct(){
    parent::__construct();
    $this->load->Model('ModelLogin');
  }

  /**
   * Registruje korisnika, i sacuva podatke na database
   */
  public function register(){

    $MIN_LENGTH = 3;
    $MAX_LENGTH = 20;
    //check for post 
    if($_SERVER['REQUEST_METHOD']=='POST'){
      // Process form
      echo print_r($_POST);

      $data['first_name']   = $_POST['firstname'];
      $data['last_name']    = $_POST['lastname'];
      $data['user_name']    = $_POST['username'];
      $data['email']        = $_POST['email'];
      $data['password']     = $_POST['password'];
      $data['c_password']   = $_POST['c_password'];
      $data['address']      = $_POST['address'];
      $data['city']         = $_POST['city'];
      //$data['number']       = $_POST['phone_number'];
      $data['country']      = $_POST['country'];


      if(strlen($data['user_name'])< $MIN_LENGTH){
        $data['error'] = '1';
        $data['message'] = 'Username is too short!';

        $data['user_name']    = '';
      }else if(strlen($data['user_name'])>$MAX_LENGTH){
        $data['error'] = '1';
        $data['message'] = 'Username is too long!';

        $data['user_name']    = '';
      }else if(strlen($data['email'])<$MIN_LENGTH){
        $data['error'] = '1';
        $data['message'] = 'Email is too short!';

        $data['email']    = '';
      }
      else if(strlen($data['password'])< $MIN_LENGTH){
        $data['error'] = '1';
        $data['message'] = 'Password is too short!';

        $data['password']    = '';
        $data['c_password']    = '';
        
      }else if(strlen($data['user_name'])>$MAX_LENGTH){
        $data['error'] = '1';
        $data['message'] = 'Password is too long!';

        $data['password']    = '';
        $data['c_password']    = '';
      }
      else if($this->usernameExists($_POST['username'])){
        $data['error'] = '1';
        $data['message'] = 'Username is taken';

        $data['user_name']    = '';
      } 
      else if($this->emailExists($_POST['email'])){
        $data['error'] = '1';
        $data['message'] = 'Email already exists';

        $data['email'] = '';
      } else if($_POST['password']!=$_POST['c_password']){
        $data['error'] = '1';
        $data['message'] = 'Passwords do not match.';

        $data['password'] = '';
        $data['c_password'] ='';
      } else {
        
        //$data['password'] = md5($data['password']);
        $this->ModelLogin->insertUser($data);
               // $this->db->insert('opsti_korisnik', $data1);
        $_SESSION['errorM'] = '1';
        $_SESSION['errorMessage'] ='U HAVE BEEN REGISTERD';
         
        redirect('login/login');
      }

      //if email exists, error=1, message= email already exists;
  
      $page = "register";
      $data['title'] = ucfirst($page);
      
      $this->loadView($page, $data);
      
      
    } else {
      // LOAD FORM
      $data =[
        'first_name' => '',
        'last_name' => '',
        'user_name' => '',
        'email' => '',
        'password'=>'',
        'c_password'=>'',
        'address'=> '',
        'city'=>'',
        'country'=>'',
        'number'=>'',
        
        'error' => '',
        'message'=> '',
      ];
      $page = "register";
      $data['title'] = ucfirst($page);
      
      $this->loadView($page, $data);
      
      //echo 'load form';
    }

  }
//======================================== LOGIN function ==================================================
  public function login(){
    //check for post 
    if($this->session->userdata('logged_on')=='1'){
      $this->go_to_dashboard();
    }


    if($_SERVER['REQUEST_METHOD']=='POST'){
     
      
      $data['email']        = $_POST['email'];
      $data['password']     = $_POST['password'];
      $email = $data['email'];
      $pass = $data['password'];

      //Prvo gledamo da li je input bio username ili email
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //Valid email, Fetch userdata by email 
        $result = $this->ModelLogin->fetchUserByEmail($email);
      }else {
        $result = $this->ModelLogin->fetchUserByUsername($email);
      }

      
      if(isset($result)){
        //$pass = md5($data['password']);
        $pass = $data['password'];

        if($result->password == $pass){
             //redirect to user dashboard 
            
             //Check if it is izvodjac
            if($this->isIzvodjac($result->username)->username == $result->username){
              // User is izvodjac 
             $this->setUser('izvodjac', $result->email, $result->username, $result->password);
              redirect(base_url());

            }else if($this->isVolonter($result->username)->username == $result->username){
              // User is Volonter
              $this->setUser('volonter', $result->email, $result->username, $result->password);
              redirect(base_url());
            }else {
              // User is Korisnik
              $this->setUser('korisnik', $result->email, $result->username, $result->password);
              redirect(base_url());
            }

             // THISSSSSS ISSS WHEREEEE WE LOADDDD THE DASHSSSH BOARDDDD
             $data['error'] = '1';
             $data['message'] = 'YOUUUU AREAEEE KING';
   
             $data['password']    = '';


        } else {
          //password is incorrect 
          $data['error'] = '1';
          $data['message'] = 'Email or password is incorrect';

          $data['password']    = '';
        }
      } else {

        //Check if it is admin
        $adminvar = $this->isAdmin($email);
        if($adminvar != null){
          //$adminvar->password;
          if($pass == $adminvar->password){
            echo "WE ARE THE BESTTTTTTTTTT";
            $user = 'admin';
            $username = $adminvar->username;
          /**
           * User types:
           *  - admin
           *  - korisnik
           *  - volonter
           *  - izvodjac
           */
          //Setting the user
          $this->setUser($user, $email, $username, $pass);
          redirect('admin/index');

          } else {
            
          }
        } else {
            //echo "THIS ISSSSS NOT ADMINNNN";
          }
          $data['error'] = '1';
          $data['message'] = 'Email or password is incorrect!';

          $data['password']    = '';
      }
      
  
      $page = "login";
      $data['title'] = ucfirst($page);
      
      // LOad Model, Redirect user to its dashbord
      $this->loadView($page, $data);
      
      
    } else {
      // LOAD FORM
      $data =[
        
        'email' => '',
        'password'=>'',
       
        'error' => '',
        'message'=> '',
      ];
      $page = "login";
      $data['title'] = ucfirst($page);
      
      $this->loadView($page, $data);
      
     
    }
  }



//========================================= RECOVER PASSWORD ====================================================

public function recover(){

  //check for post 
  if($_SERVER['REQUEST_METHOD']=='POST'){
     
      
    $data['email']        = $_POST['email'];
   
    //if username exists, error=1, message=username vec postoji;
    if($this->emailExists($_POST['email'])){

      // Send email to user. 

      

    } else {
      // if email does not exist in the database, show error 

      $data['error'] = '1';
      $data['message'] = 'Email does not exist in our database!';

      $data['email']    = '';

    } 

    $page = "recover";
    $data['title'] = ucfirst($page);
    
    // LOad Model, Redirect user to its dashbord
    $this->loadView($page, $data);
    
    
  } else {
    // LOAD FORM
    $data =[
      
      'email' => '',
     
      'error' => '',
      'message'=> '',
    ];
    $page = "recover";
    $data['title'] = ucfirst($page);
    
    $this->loadView($page, $data);
    
   
  }

}


//====================================================================================================
  
public function isAdmin($username){
  $result = $this->ModelLogin->isType($username,'admin');
  return $result;
  /**
  if(isset($result)){
    return true;
  }else 
    return false;

     */
}

public function isIzvodjac($username){
  $result = $this->ModelLogin->isType($username, 'izvodjac');
  return $result;
}

public function isVolonter($username){
  $result = $this->ModelLogin->isType($username, 'volonter');
  return $result;
}



//Ceck if username exists in the database
  private function usernameExists($username){

    return false;
  }
  
  //Check if the email is on the database
  private function emailExists($username){
    return false;
  }
  
  /**
   * This functions loads the page view
   * @param $page
   * @param $data []
   */
  private function loadView($page, $data){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('login/'.$page, $data);
    $this->load->view('templates/footer');
  }

  /**
   * This function sets the userdata into the session
   * 
   */
  private function setUser($user, $email, $username, $password){
    $this->session->set_userdata('logged_on', 1);
    $this->session->set_userdata($user, 1);
    $this->session->set_userdata('email', $email);
    $this->session->set_userdata('password', $password);
    $this->session->set_userdata('username', $username);
  }

  /**
   * This function checks the user session and redirects to certain dashboard
   */
  public function go_to_dashboard(){
    if ($this->session->userdata('admin') == 1)
              redirect("Admin/index");
      else if ($this->session->userdata('korisnik') == 1)
        redirect("Korisnik");
      else if ($this->session->userdata('izvodjac') == 1)
        redirect("Izvodjac");
      else if ($this->session->userdata('volonter') == 1)
        redirect("Volonter");
  }

  public function logout_user(){
    session_destroy();
    redirect(base_url());
  }

} // controller