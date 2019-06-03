<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<style>
<?php
    include ('style.css');
?>
</style> 

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>ENTER Admin | Control panel</title>
</head>

<body>
<div id="container">
		<div id="header">
        	<h1>ENTER<span class="off">Admin</span></h1>
            <h2>i can't into html</h2>
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
                    <li><a href="<?php echo site_url("Admin/pokaziIzvodjace"); ?>">Izvodjaci</a></li>
                    <li><a href="<?php echo site_url("Admin/pokaziKarte"); ?>">Karte</a></li>
                    <li><a href="<?php echo site_url("Admin/pokaziTermine"); ?>">Termini</a></li>
                    <li><a href="<?php echo site_url("Admin/pokaziPotvrdjene"); ?>">Dogadjaj</a></li>
                    <li><a href="<?php echo site_url("Admin/pokaziZahteve"); ?>">Zahtevi</a></li>
                    <li><a href="<?php echo site_url("Admin/pokaziAdminPoruke"); ?>">Poruke</a></li>
                    <li><a href="#">#</a></li>
                    <li><a href="#">#</a></li>
                    <li><a href="#">#</a></li>
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
                            echo "<tr><td>".$izvodjac->username."</td><td>".$izvodjac->ime."</td><td> ".$izvodjac->prezime."</td><td>".$izvodjac->email."</td> "
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
                            echo "<tr><td>".$karta->naziv."</td><td>".$karta->opis."</td><td> ".$karta->cena."</td><td>".$karta->kolicina."</td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp; <a href=\" ". site_url("Admin/obrisiKartu/".$karta->kartaID). "\">Obrisi ovu vrstu karte</a> </td> </tr>";
                            
                        }
                        echo "</table><br><br>";
                        echo "<a href=\" ". site_url("Admin/dodajKar"). "\">Dodaj novu vrstu karte</a>";
                    }
                    elseif($naredba == "termini"){
                        echo "<table> <tr><th>Datum termina:</th><th>Vreme:</th><th>Rezervisan:</th></tr>";
                    
                        foreach ($termini as $termin) {
                            echo "<tr><td>".$termin->datum."</td><td>".$termin->vreme."</td><td> ".$termin->rezervisan."</td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp; <a href=\" ". site_url("Admin/obrisiTermin/".$termin->terminID). "\">Obrisi ovaj termin</a> </td> </tr>";
                            
                        }
                        echo "</table><br><br>";
                        echo "<a href=\" ". site_url("Admin/dodajTer"). "\">Dodaj novi termin</a>";
                    }
                    elseif($naredba == "potvrdjeni"){
                        echo "<table> <tr><th>Naziv dogadjaja:</th><th>Izvodjac:</th><th>Opis:</th><th>Datum:</th><th>Vreme:</th></tr>";
                    
                        foreach ($potvrdjeni as $potvrdjen) {
                            echo "<tr><td>".$potvrdjen->naziv."</td><td>".$potvrdjen->username."</td><td> ".$potvrdjen->opis."</td><td> ". $potvrdjen->datum ."</td> <td> ". $potvrdjen->vreme ."</td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp; <a href=\" ". site_url("Admin/obrisiDogadjaj/".$potvrdjen->dogadjajID). "\">Obrisi ovaj dogadjaj</a> </td> </tr>";
                            
                        }
                        echo "</table><br><br>";
    //                    echo "<a href=\" ". site_url("Admin/dodajTer"). "\">Dodaj novi termin</a>";
                    }
                    elseif($naredba == "zahtevi"){
                        echo "<table> <tr><th>Naziv dogadjaja:</th><th>Izvodjac:</th><th>Opis:</th><th>Datum:</th><th>Vreme:</th></tr>";
                    
                        foreach ($zahtevi as $zahtev) {
                            echo "<tr><td>".$zahtev->naziv."</td><td>".$zahtev->username."</td><td> ".$zahtev->opis."</td><td> ". $zahtev->datum ."</td> <td> ". $zahtev->vreme ."</td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp; <a href=\" ". site_url("Admin/potvrdiDogadjaj/".$zahtev->dogadjajID). "\">Odobri ovaj zahtev</a> </td> "
                                    ." <td> &nbsp;&nbsp;&nbsp;&nbsp; <a href=\" ". site_url("Admin/obrisiDogadjaj/".$zahtev->dogadjajID). "\">Obrisi ovaj zahtev</a> </td> </tr>";
                            
                        }
                        echo "</table><br><br>";
    //                    echo "<a href=\" ". site_url("Admin/dodajTer"). "\">Dodaj novi termin</a>";
                    }
                    elseif($naredba == "adminporuke"){
                        echo "<table> <tr><th>Naslov poruke:</th><th>Sadrzaj:</th><th>Posiljalac:</th></tr>";
                    
                        foreach ($adminporuke as $adminporuka) {
                            echo "<tr><td>".$adminporuka->naslov."</td><td>".$adminporuka->sadrzaj."</td><td> ".$adminporuka->posiljalac."</td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp; <a href=\" ". site_url("Admin/odgovoriNaPor/".$adminporuka->porukaID). "\">Odgovori na ovu poruku</a> </td> "
                                    . "<td> &nbsp;&nbsp;&nbsp;&nbsp; <a href=\" ". site_url("Admin/obrisiAdminPoruku/".$adminporuka->porukaID). "\">Obrisi ovu poruku</a> </td> </tr>";
                            
                        }
                        echo "</table><br><br>";
  //                      echo "<a href=\" ". site_url("Admin/dodajKar"). "\">Dodaj novu vrstu karte</a>";
                    }
                ?>
        </div>
        <div id="content_bottom"></div>
            
            <div id="footer"><h3></h3></div>
      </div>
   </div>
</body>
</html>
