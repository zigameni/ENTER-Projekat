<!-- @author: Vladimir Stefanovic -->


<div class="container">




<?php 
// -----------------------------------------------------------------------------------------------
foreach ($izvodjaci as $izvodjac) {
?>
    <div class="row">
    <div class="offset-sm-2 col-sm-8">
        <div class="list-group">
            <table width = "800px">
                <tr>
                    <td rowspan="5"> 
                        <h1 class="display-4"><span style="background-color: black" align="center"> <b><?php echo $izvodjac->username ?></b> </h1>   
                    </td>
                    <td class="text-center"> 
      
                    </td>
                    <td> 
                        <img width="500px" class="rounded float-right" src="<?php echo base_url()?>assets/img/performers/<?php echo $izvodjac->username?>.jpg"> 
     
                    </td>
                </tr>
                <tr> &nbsp;</tr>
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