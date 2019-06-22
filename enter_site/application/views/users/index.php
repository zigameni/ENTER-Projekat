<?php
    // @author Vladimir Stefanovic (vs140044d@etf.bg.rs)
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>ENTER User | Control panel</title>
</head>

<body>
<div id="container">
		<div id="header">
        	
                
                
                
                 <a href="<?php echo base_url();?>"><h1>ENTER<span class="off"><?php echo strtoupper($this->session->userdata('username'));?></span></h1></a>
            <h2>Control Panel</h2>
        </div>   
        
        <div id="menu">
        	<ul>
            	<li class="menuitem"><a href="#"></a></li>
                
            </ul>
        </div>
        
        <div id="leftmenu">

        <div id="leftmenu_top"></div>

<!--        Glavni meni za dashboard-->
	<div id="leftmenu_main">    
                
                <h3>Links</h3>
                        
                <ul>
                    <li><a href="<?php echo site_url("Users/prikazDogadjaja"); ?>">Prikaz dogadjaja</a></li>
                    <li><a href="<?php echo site_url("Users/prikazKarata"); ?>">Prikaz karti</a></li>
                    <li><a href="<?php echo site_url("guest/index/tickets"); ?>">Kupovina karte</a></li>
                    <li><a href="<?php echo site_url("Users/logout"); ?>">Logout</a></li>
                </ul>
        </div>
                
                
              <div id="leftmenu_bottom"></div>
        </div>
        
        
        
        
		<div id="content">
        
        
        <div id="content_top"></div>
        <div id="content_main">
        	<?php
                    error_reporting(0);
                    if($naredba1 === NULL) $naredba1 = "pocetna";
                    if($naredba1 == "pocetna"){
                        echo "<h1><font color='white'>Hola User!</font></h1>";
                    }
                    
                    elseif($naredba1 == "dogadjaji1"){
                        echo "<table> <tr><th>Naziv:</th><th>Datum:</th><th>Vreme:</th><th>Izvodjac:</th><th>Opis:</th></tr>";
                    
                        foreach ($dogadjaji1 as $dogadjaj) {
                            echo "<tr><td>".$dogadjaj->naziv."</td><td>".$dogadjaj->datum."</td><td>".$dogadjaj->vreme."</td><td> ".$dogadjaj->username."</td><td> ".$dogadjaj->opis."</td></tr>";
                            
                        }
                        echo "</table><br><br>";
           
                    }
                    elseif($naredba1 == "karte1"){
                        echo "<table> <tr><th>Naziv:</th><th>Opis:</th><th>Cena:</th><th>Preostalo:</th><th>Kupljena:</th></tr>";
                        
                        
                        foreach ($karte1 as $karta) {
                            $brojKupljenih = 0;
                            echo "<tr><td>".$karta->naziv."</td><td>".$karta->opis."</td><td> ".$karta->cena."</td><td> ". $karta->kolicina."</td>";
                            foreach($kupljene as $kupljena){
                                if ($kupljena == $karta->kartaID) { $brojKupljenih++;};
                            };
                            echo "<td>$brojKupljenih</td>";
                            $brojKupljenih = 0;
                            echo "</tr>";
     
                        }
                        echo "</table><br><br>";
  
                    }
//                    elseif($naredba1 == "kupovina1"){
//                        echo "Missing";
//                    }
                    
                ?>
        </div>
        <div id="content_bottom"></div>
            
            <div id="footer"><h3></h3></div>
      </div>
   </div>
</body>
</html>
