<!-- @author: Gazmend Shehu -->

<div class="container">


<?php 
// -----------------------------------------------------------------------------------------------

// Kad kliknemo na BUY mora da se dodaje karta na tab karta. 
foreach ($karte as $karta) {
?>
    <div class="row">
    <div class="offset-sm-2 col-sm-8">
        <div class="alert">
            <table style="width: 100%">
                <tr>
                    <td rowspan="2"> 
                        <h1 class="display-4"><span style="background-color: red" align="center"> <b>ENTER</b> </h1>   
                    </td>
                    <td class="text-center"> 
                        <h1 style="color:black"> <b> <?php echo $karta->naziv; ?></b> </h1>   
                        <p class='lead' style="color: black"> <?php echo $karta->opis; ?> </p>    
                    </td>
                    <td > 
                        <h1 style="color:black"> <b><?php echo $karta->cena; ?> RSD</b> </h1>   
                        <button type="button" class="btn btn-danger" name="<?php echo $karta->naziv; ?>"> 
                            <a class="nav-link" style="color: black" href="<?php echo base_url();//index.php/users/prikazKarata?>index.php/guest/buyTicket/<?php echo $karta->kartaID;?>">
                                Buy Ticket 
                            </a>
                        </button>
                    </td>
                </tr>
            </table>    
        </div>
    </div>
    </div>



<?php 
}
?>


<?php
// -----------------------------------------------------------------------------------------------
?>



 




</div>