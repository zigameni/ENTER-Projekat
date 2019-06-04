<?php 
    //@author Dusan Galic  gd140092d@student.etf.bg.ac.rs
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form name="dodajTerminForma" method="post" action="<?php echo site_url('Admin/dodajTermin') ?>">
            
            Datum:&nbsp;<input type="date" name="datum" value="<?php echo set_value('datum') ?>" /><br>
            <?php echo form_error("datum","<font color='red'>","</font><br>"); ?>
            
            Vreme:&nbsp;<input type="time" name="vreme" value="<?php echo set_value('vreme') ?>" /><br>
            <?php echo form_error("vreme","<font color='red'>","</font><br>"); ?>
            
            
            <input type="submit" value="Dodaj termin">
            
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>