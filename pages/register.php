<form class="form-horizontal" action="register.php" method="post">
  <fieldset>
	<div class="form-group">
      <label class="control-label col-sm-2" for="name">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="name" placeholder="Enter you FullName" required>
      </div>
    </div>
  
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="email" placeholder="Enter email" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="RegistrationId">RegistrationId:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="Rid" placeholder="Enter your unique id" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="number">Mobile No.:</label>
      <div class="col-sm-10">
        <input type="number" min="10" class="form-control" name="number" placeholder="Enter your mobile number" required>
      </div>
    </div>
	
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="pwd" placeholder="Enter password" required>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="cpwd"></label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="confirmpwd" placeholder="Confirm password" required>
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
       
      </div>
    </div>
	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Register</button>
      </div>
    </div>
  </fieldset>
</form>

<!-- TODO 
		Validator (js) for matching password-->