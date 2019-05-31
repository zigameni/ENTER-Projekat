
<?php
//navbar-toggleable-md   navbar-inverse bg-primary
 ?>
 <nav class="navbar navbar-fixed-top navbar-inverse ">
       <div class="container">
         <div class="navbar-header">
           <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
             <span class="sr-only">Toggle navigation</span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
             <span class="icon-bar"></span>
           </button>
           <a class="navbar-brand" href="<?php echo base_url();?>home">ENTER</a>
         </div>
         <div id="navbar" class="collapse navbar-collapse">
           <ul class="nav navbar-nav">
             <li <?php if($title=="Home")echo 'class="active"'; ?> ><a href="<?php echo base_url();?>home">Home</a></li>
             <li <?php if($title=="Tickets")echo 'class="active"'; ?>> <a href="<?php echo base_url(); ?>tickets">Tickets</a></li>
             <li <?php if($title=="Lineup")echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>lineup">Lineup</a></li>
             <li <?php if($title=="Guide")echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>guide">Guide</a></li>
             <li <?php if($title=="News")echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>news">News</a></li>

           </ul>

           <ul class="nav navbar-nav navbar-right">
             <li <?php if($title=="Register")echo 'class="active"';?> ><a href="<?php echo base_url(); ?>users/register">Register</a></li>
             <li <?php if($title=="Login") echo 'class="active"';?> ><a href="<?php echo base_url(); ?>users/login">Login</a></li>
          </ul>

         </div><!-- /.nav-collapse -->
       </div><!-- /.container -->
     </nav><!-- /.navbar -->
