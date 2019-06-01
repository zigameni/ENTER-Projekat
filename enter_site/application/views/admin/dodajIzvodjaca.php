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
        <form name="dodajIzvodjacaForma" method="post" action="<?php echo site_url('Admin/dodajIzvodjaca') ?>">
            
            Username:&nbsp;<input type="text" name="username" value="<?php echo set_value('username') ?>" /><br>
            <?php echo form_error("username","<font color='red'>","</font><br>"); ?>
            
            Password:&nbsp;<input type="password" name="password" value="" /><br>
            <?php echo form_error("password","<font color='red'>","</font><br>"); ?>
            
            Ime:&nbsp;<input type="text" name="name" value="<?php echo set_value('name') ?>" /></br>
            <?php echo form_error("name","<font color='red'>","</font><br>"); ?>
            
            Prezime:&nbsp;<input type="text" name="lastname" value="<?php echo set_value('lastname') ?>" /></br>
            <?php echo form_error("lastname","<font color='red'>","</font><br>"); ?>
            
            Adresa:&nbsp;<input type="text" name="address" value="<?php echo set_value('address') ?>" /></br>
            <?php echo form_error("address","<font color='red'>","</font><br>"); ?>
            
            Grad:&nbsp;<input type="text" name="city" value="<?php echo set_value('city') ?>" /></br>
            <?php echo form_error("city","<font color='red'>","</font><br>"); ?>
            
            Drzava:&nbsp;<input type="text" name="state" value="<?php echo set_value('state') ?>" /></br>
            <?php echo form_error("state","<font color='red'>","</font><br>"); ?>
            
            E-mail:&nbsp;<input type="text" name="email" value="<?php echo set_value('email') ?>" /></br>
            <?php echo form_error("email","<font color='red'>","</font><br>"); ?>
            
            <input type="submit" value="Dodaj izvodjaca">
            
        </form>
        <?php
        // put your code here
        ?>
    </body>
</html>
