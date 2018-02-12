//Getting value from "prescription.php".

$(document).ready(function() {

	// Variables
	var medicine = [];
	var dose = [];
	var duration = [];
	
	
   $("#list").hide();
   
	/* On pressing a key on "Search box" in "search.php" file. This function will be called. */
	$("#search").keyup(function() {

       //Assigning search box value to javascript variable named as "name".
       var name = $('#search').val();

       //Validating, if "name" is empty.
       if (name == "") {
           $("#list").hide();
       }
       else {
           //AJAX is called.
           $.ajax({
            	type: "POST",
                url: "prescription.php",
                data: {search: name},

                 //If result found, this function will be called.
				success:  function(result){
					//alert(result);
					$("#list").html(result).show();
				}
            });
        }
    });

	/* when the medicine has been selected */
	$("#list").change(function() {
		//medicine.push($(this).val());
		$("#search").val($(this).val());
		$("#list").hide();
	});

	
	/* Adding the selected medicine to prescription */
	$("#addon").click(function(){
		medicine.push($("#list").val());
		
		dose.push($("input[type='radio']:checked").val());
		
		duration.push($("input[type='number']").val());
		
		// appending to html
		var len = medicine.length - 1; 
		var string = "<tr><td>" + medicine[len] + "</td><td>" + dose[len] + "</td><td>" + duration[len] + "</td></tr>";
		$('#med-table tbody').append(string);
		
		// clearing the fields for next input
		$("#search").val("");
		$(".form-check-input").prop('checked', false);
		$("#duration").val("");
	});
	
	/* prescribing and sending message to patient */
	$("#prescribe").click(function(){
		
		// ensure atleast one drug is there in table
		var rowCount = $('#med-table >tbody >tr').length;
		if (rowCount == 0){
			alert("Select drug first!");
		}
		else{
			// making a AJAX call to "saveit"
			$.ajax({
				type: "POST",
				url: "saveit.php",
				data: {medicine: medicine, dose: dose, duration: duration},
				
				success: function(msg){
					alert(msg);
					
					// back for new patient
					window.location.replace("index.php")
				},
				
				error: function(){
					alert("Something went wrong");
				}
			});
		}
	});
});