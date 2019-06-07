<?php
    //@author Gazmend Shehu  sg160664d@student.etf.bg.ac.rs
?>




<?php 
  if($title == "Contact"  || $title == "Guide"){
?>
  <style type="text/css">
  .jumbotron{
    background-image: url("http://localhost/enter_site/assets/img/pages/bg_img.jpg");
    background-size: cover;
    color: white;
    min-height: 350px;
  }
</style>


<?php
  } else if ($title == "Tickets"){
?>
<style type="text/css">
  .jumbotron{
    background-image: url("http://localhost/enter_site/assets/img/pages/bg_img_Tickets.jpg");
    background-size: cover;
    color: white;
    min-height: 350px;
  }

  .alert {
    background-image: url("http://localhost/enter_site/assets/img/pages/bg_img_Tickets.jpg");
    background-size: cover;
    color: white;
    min-height: 150px;
  }
</style>






<?php 
  }
?>

<script>
  document.body.style.backgroundColor = "black";
</script>
<div class="jumbotron jumbotron-fluid">
  <div class="container text-center">

    
    <h1 class="display-4"><span style="background-color: #FF0000"> <b>ENTER</b> </h1>
    <br>
    <h1 ><span style="background-color: black">  <b><?php echo strtoupper($title);?></b></span></h1>
  </div>
</div>
