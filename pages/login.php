<h2>Login form</h2>
  <!--    from without client side validator
  
  <form class="form-horizontal" action="login.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
            <button type="button" class="btn btn-default" onClick="location.href='Register.php'" onFocus="Register.php" id="reg">Register</button>
            </div>

    </div>
  </form>
  
 -->
  
  <!-- Documentation at http://1000hz.github.io/bootstrap-validator/# -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
  
  <div class="container">

	<form action="login.php" method="post" data-toggle="validator" role="form">
  
		<div class="form-group">
			<label for="inputName" class="control-label">Name</label>
			<input type="text" class="form-control" id="inputName" placeholder="Username" required>
		</div>
  
		<div class="form-group">
			<label for="inputPassword" class="control-label">Password</label>
			<input type="password" data-minlength="6" class="form-control" id="inputPassword" placeholder="Password" data-error="Password length must be > 6" required>
			<div class="help-block with-errors"></div>
		</div>
  
		<div class="form-group">        
			<div class="checkbox">
				<label><input type="checkbox" name="remember"> Remember me</label>
			</div>
		</div>
	
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</form>
  </div>
  