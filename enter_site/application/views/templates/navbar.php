<header>
 
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container">

     <!--  ENTER = HOME -->
    <a class="navbar-brand" href="<?php echo base_url();?>">ENTER</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">

        <!--  TICKETS -->
        <li class="nav-item <?php if($title=='Tickets')echo 'active';?>">
          <a class="nav-link" href="<?php echo base_url();?>index.php/guest/index/tickets">TICKETS</a>
        </li>

        <!--  Line UP -->
        <li class="nav-item <?php if($title=='Lineup')echo 'active';?>">
          <a class="nav-link" href="<?php echo base_url();?>index.php/guest/index/lineup">LINEUP</a>
        </li>

        <!--  GUIDE -->
        <li class="nav-item <?php if($title=='Guide')echo 'active';?>">
          <a class="nav-link" href="<?php echo base_url();?>index.php/guest/index/guide">GUIDE</a>
        </li>

        <!--  NEWS -->
        <li class="nav-item <?php if($title=='News')echo 'active';?>">
          <a class="nav-link" href="<?php echo base_url();?>index.php/guest/index/news">NEWS</a>
        </li>

      </ul>
      

      <ul class="navbar-nav ml-auto">
        <!--  REGISTER -->
        <li class="nav-item <?php if($title=='Register')echo 'active';?>">
          <a class="nav-link" href="<?php echo base_url();?>index.php/login/register">REGISTER</a>
        </li>
        
         <!--  LOGIN -->
         <li class="nav-item <?php if($title=='Login')echo 'active';?>">
          <a class="nav-link" href="<?php echo base_url();?>index.php/login/login">SIGN IN</a>
        </li>

      </ul>
    </div>

    </div>
  </nav>
 
</header>