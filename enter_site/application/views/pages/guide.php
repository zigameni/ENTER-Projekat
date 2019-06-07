


<div class="container">
<nav class="nav navbar justify-content-center navbar-expand-lg navbar-light bg-light">
    <a href="<?php echo base_url();?>index.php/guest/guide/policy" class="nav-item nav-link"><?php if($subPage == "policy") echo '<b>POLICY</b>'; else echo 'POLICY';?></a>
    <a href="<?php echo base_url();?>index.php/guest/guide/parking" class="nav-item nav-link"><?php if($subPage == "parking") echo '<b>PARKING</b>'; else echo 'PARKING';?></a>
    <a href="<?php echo base_url();?>index.php/guest/guide/restrictions" class="nav-item nav-link"><?php if($subPage == "restrictions") echo '<b>RESTRICTIONS</b>'; else echo 'RESTRICTIONS';?></a>
</nav>

<br>
<br>


<div class="jumbotron-fluid">
  <div class="container text-center text-light">

    <?php 
    if($subPage == "policy"){
    ?>      
        <h1 class="display-4 "><span style="background-color: black"> <b>General Policy</b> </h1>
        <p class="lead">Gates open at 4PM. Gates will close at 11PM. 
        You will be searched upon entry to festival grounds. 
        You’ll be required to empty your pockets and allow security to check 
        through bags, wallets and purses. 
        We reserve the right to refuse entry to anyone.</p>
        <br>
    <?php

    } else if($subPage == "parking") {
        ?> 
    <h1 class="display-4 "><span style="background-color: black"> <b>Parking</b> </h1>
    <p class="lead">The venue features plenty of on-site parking, available for purchase 
        upon arrival only. Parking is not included in the purchase of 
        your admission ticket.</p>
        <br>
<?php
    } else {
?>
     
     <h3>KINDLY RESPECT AND FOLLOW ALL RULES AND REGULATIONS, THEY WERE CREATED WITH YOUR SAFETY IN MIND.</h3>
     <p class="lead" align="left">
       - Lost or stolen tickets will not be reissued. <br>

       - All tickets are non refundable.<br>

       - Rain or shine, Wickerpark will take place as planned.<br>

       - Children under the age of 10 are admitted for free when accompanied by an adult.<br>

      - By entering the festival grounds you are agreeing to be photographed or filmed.<br>

       - All attendees will be searched upon entering the festival grounds. 
        Prohibited items: Tents, lounge chairs, instruments, knives or other weapons, selfie sticks, food, beverages (other than one sealed bottled of water), drugs...
        <br>
       - Attendees under the age of 18 won't be served alcohol. Organizers may ask for ID.<br>

       - Unused tokens will not be refunded.<br>

       - Pets are allowed on site, however we urge you to bring a waste bag with you, and should your pet be aggressive a muzzle is required.
        <br>
       - Whilst all acts are confirmed, line up is subject to change.<br>

       - Please respect our neighbors. Please don't be loud, don't litter, don't park your cars in private properties.<br>

       - The management reserve the right to alter these rules and regulations as they see fit.<br>

       - Our security team is present to make this concert experience safe and fun for everyone‭; ‬kindly cooperate‭.‬</p>
        <br>
<?php
    }
  
    ?>  
  
  
  

    
   
  </div>
</div>
      
   



</div>
