<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->Model('ModelLogin');
  }

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
        
        $data['password'] = md5($data['password']);
        $this->ModelLogin->insertUser($data);
               // $this->db->insert('opsti_korisnik', $data1);

               
               $_SESSION['errorM'] = '1';
               $_SESSION['errorMessage'] ='U HAVE BEEN REGISTERD';
        
         
        redirect('login/login');
        echo "DONEEEEEEE";
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
    if($_SERVER['REQUEST_METHOD']=='POST'){
     
      
      $data['email']        = $_POST['email'];
      $data['password']     = $_POST['password'];
      $email = $data['email'];
      //if username exists, error=1, message=username vec postoji;
      //$query ="SELECT * FROM `opsti_korisnik` WHERE email = '$email'";

      $result = $this->ModelLogin->fetchUser($email);
      
      if(isset($result)){
        $pass = md5($data['password']);
        
        if($result->password == $pass){
             //redirect to user dashboard 
              
            if($this->isAdmin($result->username)){

               echo "WE ARE THE BESTTTTTTTTTT"; 
                // redirect ot admin dashbord
            } //else if(isIzvodjac($result->username)){
                // redirect to izvidjac dashboard
            //} else if(isModerator($result->username)){
                //redirect to modreator dashboard
            //} else if(is($sa)){

            //}

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
          $data['error'] = '1';
          $data['message'] = 'WEEE RESULT NORESULT = 0';

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
  $result = $this->ModelLogin->isType($username, 'admin');
  if(isset($result)){
    return true;
  }else 
    return false;
}



//Ceck if username exists in the database
  private function usernameExists($username){

    return false;
  }
  
  //Check if the email is on the database
  private function emailExists($username){
    return false;
  }
  
  private function loadView($page, $data){
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);
    $this->load->view('login/'.$page, $data);
    $this->load->view('templates/footer');
  }
} // controller