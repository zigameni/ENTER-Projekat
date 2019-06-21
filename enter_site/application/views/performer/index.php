<?php
    // @author Jelena Milojevic  mj140638d@student.etf.bg.ac.rs
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>ENTER Performer | Control panel</title>
</head>

<body>
<div id="container">
		<div id="header">
        	<h1>ENTER<span class="off">Performer</span></h1>
            <h2>Control Panel</h2>
        </div>   
        
        <div id="menu">
        	<ul>
            	<li class="menuitem"><a href="#">#</a></li>
                <li class="menuitem"><a href="#">#</a></li>
                <li class="menuitem"><a href="#">#</a></li>
                <li class="menuitem"><a href="#">#</a></li>
                <li class="menuitem"><a href="#">#</a></li>
              <li class="menuitem"><a href="#">#</a></li>
            </ul>
        </div>
        
        <div id="leftmenu">

        <div id="leftmenu_top"></div>

				<div id="leftmenu_main">    
                
                <h3>Links</h3>
                        
                <ul>
                    <li><a href="<?php echo site_url("Performer/slobodniTermini"); ?>">Slobodni termini</a></li>
                    <li><a href="<?php echo site_url("Performer/odobreniZahtevi"); ?>">Odobreni zahtevi</a></li>
                    <li><a href="<?php echo site_url("Performer/dodajDog"); ?>">Prijava za nastup</a></li>
                    <li><a href="#">#</a></li>
                    <li><a href="#">#</a></li>
                    <li><a href="#">#</a></li>
                    <li><a href="#">#</a></li>
                    <li><a href="#">#</a></li>
                    <li><a href="<?php echo site_url("Performer/logout"); ?>">Logout</a></li>
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
                        echo "Hola Mr. Performer!";
                    }
                    
                    elseif($naredba1 == "termini1"){
                        echo "<table> <tr><th>Datum termina:</th><th>Vreme:</th><th>Rezervisan:</th><th>TerminId:</th></tr>";
                    
                        foreach ($termini1 as $termin) {
                            echo "<tr><td>".$termin->datum."</td><td>".$termin->vreme."</td><td> ".$termin->rezervisan."</td><td> ".$termin->terminID."</td></tr>";
                            
                        }
                        echo "</table><br><br>";
           
                    }
                    elseif($naredba1 == "potvrdjeni1"){
                        echo "<table> <tr><th>Naziv dogadjaja:</th><th>Izvodjac:</th><th>Opis:</th><th>Datum:</th><th>Vreme:</th></tr>";
                    
                        foreach ($potvrdjeni1 as $potvrdjen) {
                            echo "<tr><td>".$potvrdjen->naziv."</td><td>".$potvrdjen->username."</td><td> ".$potvrdjen->opis."</td><td> ". $potvrdjen->datum ."</td> <td> ". $potvrdjen->vreme ."</td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp; </td> </tr>";
                            
                        }
                        echo "</table><br><br>";
    //                    echo "<a href=\" ". site_url("Admin/dodajTer"). "\">Dodaj novi termin</a>";
                    }
                    elseif($naredba1 == "zahtevi1"){
                        echo "<table> <tr><th>Naziv dogadjaja:</th><th>Izvodjac:</th><th>Opis:</th><th>Datum:</th><th>Vreme:</th></tr>";
                    
                        foreach ($zahtevi1 as $zahtev) {
                            echo "<tr><td>".$zahtev->naziv."</td><td>".$zahtev->username."</td><td> ".$zahtev->opis."</td><td> ". $zahtev->datum ."</td> <td> ". $zahtev->vreme ."</td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp;  </td> "
                                    ." <td> &nbsp;&nbsp;&nbsp;&nbsp;  </td> </tr>";
                            
                        }
                        echo "</table><br><br>";
    //                    echo "<a href=\" ". site_url("Admin/dodajTer"). "\">Dodaj novi termin</a>";
                    }
                    
                ?>
        </div>
        <div id="content_bottom"></div>
            
            <div id="footer"><h3></h3></div>
      </div>
   </div>
</body>
</html>
