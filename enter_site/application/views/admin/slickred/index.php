<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<style>
<?php
    include ('style.css');
?>
</style> 

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>SlickRed | florida web design</title>
</head>

<body>
<div id="container">
		<div id="header">
        	<h1>Slick<span class="off">Red</span></h1>
            <h2>A template by Bryant Smith</h2>
        </div>   
        
        <div id="menu">
        	<ul>
            	<li class="menuitem"><a href="#">Home</a></li>
                <li class="menuitem"><a href="#">About</a></li>
                <li class="menuitem"><a href="#">Products</a></li>
                <li class="menuitem"><a href="#">Services</a></li>
                <li class="menuitem"><a href="#">Design</a></li>
              <li class="menuitem"><a href="#">Contact</a></li>
            </ul>
        </div>
        
        <div id="leftmenu">

        <div id="leftmenu_top"></div>

				<div id="leftmenu_main">    
                
                <h3>Links</h3>
                        
                <ul>
                    <li><a href="<?php echo site_url("Admin/pokaziIzvodjace"); ?>">Izvodjaci</a></li>
                    <li><a href="<?php echo site_url("Admin/pokaziKarte"); ?>">Karte</a></li>
                    <li><a href="<?php echo site_url("Admin/pokaziTermine"); ?>">Termini</a></li>
                    <li><a href="#">jQuery</a></li>
                    <li><a href="#">Web design</a></li>
                    <li><a href="#">Web Programming</a></li>
                    <li><a href="#">Content Creation</a></li>
                    <li><a href="#">Internet Marketing</a></li>
                    <li><a href="#">XHTML Templates</a></li>
                </ul>
</div>
                
                
              <div id="leftmenu_bottom"></div>
        </div>
        
        
        
        
		<div id="content">
        
        
        <div id="content_top"></div>
        <div id="content_main">
        	<?php
                    error_reporting(0);
                    if($naredba === NULL) $naredba = "pocetna";
                    if ($naredba == "izvodjaci"){
                        echo "<table> <tr><th>Izvodjaci:</th></tr>";
                    
                        foreach ($izvodjaci as $izvodjac) {
                            echo "<tr><td>".$izvodjac->username."</td><td>".$izvodjac->ime." ".$izvodjac->prezime."</td><td>".$izvodjac->email."</td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp; <a href=\" ". site_url("Admin/obrisiIzvodjaca/".$izvodjac->username). "\">Obrisi ovog izvodjaca</a> </td> </tr>";
                            
                        }
                        echo "</table><br><br>";
                        echo "<a href=\" ". site_url("Admin/dodajIzv"). "\">Dodaj novog izvodjaca</a>";
                        
                    }
                    elseif($naredba == "pocetna"){
                        echo "Hola Mr. Admin!";
                    }
                    elseif($naredba == "karte"){
                        echo "<table> <tr><th>Naziv karte:</th><th>Opis:</th><th>Cena:</th><th>Kolicina:</th></tr>";
                    
                        foreach ($karte as $karta) {
                            echo "<tr><td>".$karta->naziv."</td><td>".$karta->opis." ".$karta->cena."</td><td>".$karta->kolicina."</td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp; <a href=\" ". site_url("Admin/obrisiKartu/".$karta->kartaID). "\">Obrisi ovu vrstu karte</a> </td> </tr>";
                            
                        }
                        echo "</table><br><br>";
                        echo "<a href=\" ". site_url("Admin/dodajKar"). "\">Dodaj novu vrstu karte</a>";
                    }
                    elseif($naredba == "termini"){
                        echo "<table> <tr><th>Datum termina:</th><th>Vreme:</th><th>Rezervisan:</th></tr>";
                    
                        foreach ($termini as $termin) {
                            echo "<tr><td>".$termin->datum."</td><td>".$termin->vreme." ".$termin->rezervisan."</td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp; <a href=\" ". site_url("Admin/obrisiTermin/".$termin->terminID). "\">Obrisi ovaj termin</a> </td> </tr>";
                            
                        }
                        echo "</table><br><br>";
                        echo "<a href=\" ". site_url("Admin/dodajTer"). "\">Dodaj novi termin</a>";
                    }
                ?>
        </div>
        <div id="content_bottom"></div>
            
            <div id="footer"><h3><a href="http://www.bryantsmith.com">florida web design</a></h3></div>
      </div>
   </div>
</body>
</html>
