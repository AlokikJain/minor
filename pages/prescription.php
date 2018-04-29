<script type="text/javascript" src="static/prescription.js"></script>

<!-- the first half of the page -->
<div id="getMedicine">
  <form>
    <div class="form-group">
      
      <label for="search"> Medicine Name:</label>
      <input type="text" class="form-control" id="search" placeholder="Enter medicine name">

      <select multiple class="form-control" id="list">    </select>
          

      <br><label>Dose/Day:</label><br>
      
    	 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
    	 <label class="form-check-label" for="inlineRadio1">1</label>
      
      
    	 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
    	 <label class="form-check-label" for="inlineRadio2">2</label>
      
      
    	 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
    	 <label class="form-check-label" for="inlineRadio3">3</label>
      
    	 <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
    	 <label class="form-check-label" for="inlineRadio4">4</label><br>
    	
      <br><label for="duration">Duration</label>
      <input type="number" class="form-control" min="0" id="duration" name="duration" placeholder="0"><br>

        <button type="button" class="btn btn-primary col-sm-offset-5" id="addon">Add</button><br><br>
    </div>
  </form>
</div>

<!-----------------------------------Table for selected drugs---------------------------->
<table class="table table-striped" id="med-table">
    <thead>
      <tr>
        <th> </th>
        <th>Medicine Name</th>
        <th>Dose / Day</th>
        <th>Duration(in days)</th>
      </tr>
    </thead>
    <tbody>
	 <!-- content will be added by jQuery dynamically -->
    </tbody>
  </table>

<button type="submit" class="btn btn-primary col-sm-offset-5" id="prescribe">Confirm</button>  

<!-- hidden by default till the confirm button is pressed and to show the prescription -->
<div id ="DivIdToPrint" class="scene_element scene_element--fadeinup">
	<h3 style="font-weight: bolder; text-align:center;">Prescription</h3>
	<br><hr><br>

	<h4 style="font-weight: bold;">Patient Details: </h4>
	<div id="patientDetails">
		<?php echo $_SESSION['pname']; ?>
		<br>
		<?php echo $_SESSION['pcontact']; ?> <br>
	</div>

	<hr>
	<h4 style="font-weight: bold;">Prescribed by: </h4>
	<span id="doctorName"> <?php echo $_SESSION['name']; ?> </span>
	<br>
	<span id="date"> <?php date_default_timezone_set("Asia/Kolkata"); ?>Date: <?php echo date("d-m-Y"); ?> <span id=time>Time : <?php date_default_timezone_set("Asia/Kolkata"); ?>
		<?php echo date("h:i:sa"); ?> </span></span>

	<hr>
	<table class="table table-striped" id="print-table">
      <thead></thead>
	  <tbody>
	    
	  </tbody>
	</table>
	<div id="justforfun">Thanks for visitng! </div>
	<div id="bottom">
    <div style="float:left;">
		<button class="btn btn-primary col-sm-offset-2" id="new_patient">Continue</button>
  </div>
  <div style="float:right;">
		<button class="btn btn-primary col-sm-offset-7" id="print_prescription">Print</button>	
  </div>
	</div>
  
</div>