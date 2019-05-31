<?php

/**
 *
 */
class Pages extends CI_Controller{

  public function view ($page = 'home'){
    if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
  				show_404();
  	}

    //the variables that we want to pass into the views
    $data['title'] = ucfirst($page);

    //now we want to load the parts of the page:
    $this->load->view('templates/header', $data);
    $this->load->view('templates/navbar', $data);


    $this->load->view('pages/'.$page, $data);
    $this->load->view('templates/footer');

  }
}





 ?>
