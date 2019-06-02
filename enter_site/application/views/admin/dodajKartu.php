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
        <form name="dodajKartuForma" method="post" action="<?php echo site_url('Admin/dodajKartu') ?>">
            
            Naziv:&nbsp;<input type="text" name="naziv" value="<?php echo set_value('naziv') ?>" /><br>
            <?php echo form_error("naziv","<font color='red'>","</font><br>"); ?>
            
            Cena:&nbsp;<input type="text" name="cena" value="<?php echo set_value('cena') ?>" /><br>
            <?php echo form_error("cena","<font color='red'>","</font><br>"); ?>
            
            Kolicina:&nbsp;<input type="text" name="kolicina" value="<?php echo set_value('kolicina') ?>" /></br>
            <?php echo form_error("kolicina","<font color='red'>","</font><br>"); ?>
            
            Opis:&nbsp;<input type="textarea" name="opis" value="<?php echo set_value('opis') ?>" /></br>
            <?php echo form_error("opis","<font color='red'>","</font><br>"); ?>
            
            <input type="submit" value="Dodaj kartu">
            
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>