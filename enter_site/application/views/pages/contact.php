<!-- @author: Gazmend Shehu -->



<div class="main-container">
    





<div class="container text-light justify-content-center main-container">
<div class="row">
    <div class="col-offset-auto col-md-6 " id="form_container">
        <h2>Contact Us</h2>
        <p>
           Please send your message below. We will get back to you at the earliest!  <br>
          *** Important: You must be logged in in order to send a message. ***
        </p>
            <?php   if($error_m =='1'){  ?>     
            <div class="alert alert-danger" role="alert">
            <?php
            echo $error_ms;
            ?>
            </div>
            <?php
            }
            ?>            
        
        <form role="form" method="post" id="reused_form" action="poruka">
        
            <div class="row">
                <div class="col-sm-12 form-group">
                   
                    <label for="subject">
                        Subject:</label>
                    <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $subject; ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="message">
                        Message:</label>
                    <textarea class="form-control" type="textarea" name="message" id="message" maxlength="6000" rows="7" value="<?php echo $message ;?>"></textarea>
                </div>
            </div>
            <div class="row">
                
                <div class="col-sm-12 form-group">
                    <label for="username">
                        Username:</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username ;?>"required>
                </div>
            </div>


            <div class="row">
            <div class="offset-9 col-md-9">
                            <button type="submit" class="btnSubmit center">Send →</button>
                          
            </div>
            </div>
            
        </form>
        
    </div>
</div>
</div>


</div>
