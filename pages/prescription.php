<script type="text/javascript" src="scripts/liveSearch.js"></script>

<label for="search"> Medicine Name:</label>
<input type="text" class="form-control" id="search" placeholder="Enter medicine name" />
<form>
    <div class="form-group">
      
      <select multiple class="form-control" id="list">
        
      </select>
      
    </div>
</form>

<label>Dose/Day:</label><br>
  
	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
	<label class="form-check-label" for="inlineRadio1">1</label>
  
  
	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
	<label class="form-check-label" for="inlineRadio2">2</label>
  
  
	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
	<label class="form-check-label" for="inlineRadio3">3</label>
  
	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
	<label class="form-check-label" for="inlineRadio4">4</label><br>
	
<label for="duration">Duration</label>
<input type="number" class="form-control" min="0" id="duration" name="duration" placeholder="0"/><br>

<button type="submit" class="btn btn-primary col-sm-offset-5" id="addon">Add</button><br><br>


<!-----------------------------------Table for selected drugs---------------------------->
<table class="table table-striped" id="med-table">
    <thead>
      <tr>
        <th>Medicine Name</th>
        <th>Dose / Day</th>
        <th>Duration(in days)</th>
      </tr>
    </thead>
    <tbody>
	
    </tbody>
  </table>

<button type="submit" class="btn btn-primary col-sm-offset-5" id="prescribe">Confirm</button>  