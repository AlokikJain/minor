<script type="text/javascript" src="static/pDetails.js"></script>

<!-- following div is hidden by default -->
<div class="alert alert-warning alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>New Patient!</strong> Register the patient first
</div>

<div id="getPatient" class="scene_element scene_element--fadeinright">
  <h2>Patients's Details</h2>

    <form class="fform" action="bg-Patientdetails.php" method="post">
      
      <div class="form-group">
        <label for="name">Patient's Name:</label>
        <input type="text" class="form-control" placeholder="Enter Patient's name" id="name" name="name" required>
      </div>
  	
      <div class="form-group">
        <label for="number">Patient's Contact no:</label>
        <input type="number" class="form-control" placeholder="Mobile Number" id="phone" name="contact" required>
      </div>

      <div class="getRegister">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email" placeholder="Enter email" required>
        </div>
    	   
         <div class="form-group">
          <label for="pwd">Password:</label>      
          <input type="password" class="form-control" name="pwd" placeholder="Enter password" required>
        </div>

        <button type="submit" id = "register" name="register" class="btn btn-primary">Register</button>
      </div>

        <button id = "check" name="next" class="btn btn-primary">Next</button>
        <br><br>
    </form>
</div>