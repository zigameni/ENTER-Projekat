<?php
    //@author Jelena Milojevic  mj140638d@student.etf.bg.ac.rs
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
        <form name="dodajEventForma" method="post" action="<?php echo site_url('Performer/dodajDog') ?>">
            
            Naziv:&nbsp;<input type="text" name="naziv" value="<?php echo set_value('naziv') ?>" /></br>
            <?php echo form_error("name","<font color='red'>","</font><br>"); ?>
            
            Opis:&nbsp;<input type="text" name="opis" value="<?php echo set_value('opis') ?>" /></br>
            <?php echo form_error("lastname","<font color='red'>","</font><br>"); ?>
            
            TerminId:&nbsp;<input type="text" name="terminId" value="<?php echo set_value('terminId') ?>" /></br>
            <?php echo form_error("address","<font color='red'>","</font><br>"); ?>
            
            Username:&nbsp;<input type="text" name="username" value="<?php echo set_value('username') ?>" /></br>
            <?php echo form_error("city","<font color='red'>","</font><br>"); ?>
            
            <input type="submit" value="Prijavi se na termin!">
            
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
