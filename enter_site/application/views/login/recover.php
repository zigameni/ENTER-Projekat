<br>
<br>
<div class="container register-form">
  
	<div class="row">
		<div class="offset-2 col-md-8">

    <!-- This form redirect user to the home page after clicking  -->
		<form id="register-form" method="post" role="form" action="<?php echo site_url('guest')?>">
    <div class="form-content">
      <div class="form-group">
			<div class="alert alert-primary text-center" role="alert">
  Email Address
</div>
        
        <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address"
          value="" autocomplete="off" />
      </div>
      <div class="form-group">
        <div class="row">

          <div class="col-lg-6 col-sm-6 col-xs-6">	
							<input type="submit" name="cancel-submit" id="cencel-submit" tabindex="2"
              class="form-control btn btn-danger" value="Cancel" />
          </div>

          <div class="col-lg-6 col-sm-6 col-xs-6">
            <input type="submit" name="recover-submit" id="recover-submit" tabindex="2"
              class="form-control btn btn-success" value="Send Password Reset Link" />
          </div>


        </div>
      </div>
    </div>

  </form>
		
		
		</div>
	
	</div>
	
</div>
