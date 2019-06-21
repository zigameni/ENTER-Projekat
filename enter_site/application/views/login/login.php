<br>
<br>
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>SIGN IN</p>
                </div>
                <?php
                  
                    if($error=='1'){
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo $message;
                        echo '</div>';

                        
                    }else if($_SESSION['errorM'] == '1'){
                        echo "<div class='alert alert-success' role='alert'>";
                        echo $_SESSION['errorMessage'];
                        echo '</div>';
                        
                        $_SESSION['errorM'] = '';
                        $_SESSION['errorMessage'] ='';
                       
                    }
                
                ?>
                <form id="register-form" method="post" role="form" action="<?php echo site_url('login/login')?>"> 
                <div class="form-content">
                    <div class="row">
                        <div class="offset-3 col-md-6 ">

                          
                            <div class="form-group">
                                <input type="text" name="email" id="register_email"  class="form-control" placeholder="Email Address *" value="<?php echo $email; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Your Password *" value="<?php echo $password; ?>" required>
                            </div>
                           
                           
                           
                        </div>

                    </div>

                    <div class="row">                            
                        <div class="offset-5 col-md-6">
                            <button type="submit" class="btnSubmit center">Submit</button>
                          
                       </div>
                       <div class="offset-5 col-md-6">
                          <a style="text-align: right"href="<?php echo site_url();?>/login/recover">Forgot password</a>
                        </div>
                    </div>

                    </form>
                </div>
            </div>
</div> <!-- COntainer -->
<br><br><br><br><br><br><br>