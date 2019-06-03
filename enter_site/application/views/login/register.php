<br>
<br>
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Registration</p>
                </div>
                <?php
                    if($error=='1'){
                        echo "<div class='alert alert-danger' role='alert'>";
                        echo $message;
                        echo '</div>';
                    }
                ?>
                <form id="register-form" method="post" role="form" action="<?php echo site_url('login/register')?>"> 
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Your First Name *" value="<?php echo $first_name; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Your Last Name *" value="<?php echo $last_name; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Username*" value="<?php echo $user_name; ?>" required>
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" id="register_email"  class="form-control" placeholder="Email Address *" value="<?php echo $email; ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Your Password *" value="<?php echo $password; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Confirm Password *" value="<?php echo $c_password; ?>" required>
                            </div>

                           
                        </div>
                        <div class="col-md-6">
                        <!-- 
                             <div class="form-group">
                                <input type="text" name="phone_number" id="phone_number" class="form-control" placeholder="Phone Number *" value="<?php echo $number; ?>" required>
                            </div>

                        -->
                            <div class="form-group">
                                <input type="text" name="address" id="address" class="form-control" placeholder="Address *" value="<?php echo $address; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="city" id="city" class="form-control" placeholder="City *" value="<?php echo $city; ?>" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="country" id="country" class="form-control" placeholder="Country *" value="<?php echo $country; ?>" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btnSubmit">Submit</button>
                    </form>
                </div>
            </div>
</div> <!-- COntainer -->