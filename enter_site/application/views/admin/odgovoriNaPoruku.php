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
        <form name="odgovoriNaPorukuForma" method="post" action="<?php  error_reporting(0); echo site_url('Admin/odgovoriNaPoruku/'.$adminporuka); ?>">
                                   
            Naslov:&nbsp;<input type="text" name="naslov" value="<?php echo set_value('naslov') ?>" /></br>
            <?php echo form_error("naslov","<font color='red'>","</font><br>"); ?>
            
            Sadrzaj:&nbsp;<input type="textarea" rows="4" cols="50" name="sadrzaj" value="<?php echo set_value('sadrzaj') ?>" /></br>
            <?php echo form_error("sadrzaj","<font color='red'>","</font><br>"); ?>
            
            <input type="submit" value="Posalji odgovor">
            
        </form>
        <?php
        echo $username;
        ?>
    </body>
</html>
