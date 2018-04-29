/**
* Control, alter all the activities on the prescription page
*/

$(document).ready(function() {

	// Variables to store prescription temporary
	var medicine = [];
	var dose = [];
	var duration = [];
	
	// modifying the css for this page apart from css sheet
	$("main").css({ 'background' : 'none', 'background-color' : '#f7f8f9' , 'padding' : '0px!important'});

	// hide the area where medicine suggestion are shown
	$("#list").hide();

	// hides the div that'll be shown after the confirmation
	$("#DivIdToPrint").hide();

	/* 
	* For each keystroke in the medicine field, do a ajax call to server and retrieve the corresponding medicine name
	*/
	$("#search").keyup(function() {

		// Assigning search box value to javascript variable named as "name".
		var name = $('#search').val();

		// Validating, if "name" is empty.
		if (name == "") {
			$("#list").hide();
		}
		else {
			// making AJAX call
			$.ajax({
				type: "POST",	// method to send data
				url: "prescription.php",	// data will be sent to this file
				data: {search: name},		// data that'll be send

				//If result found, this function will be called.
				success:  function(result){
					$("#list").html(result).show();
				}
			});
		}
	});


	/*
	* if search field is clicked, select/highlight all the text of it
	*/
	$("#search").focus(function() { this.select(); });

	// intialising the tooltip (necessary)
	// for the delete button to work
	$('[data-toggle="tooltip"]').tooltip(); 



	/* 
	* Execute when a medicine has been selected
	*/
	$("#list").change(function() {
		// Assign the selected medicine name to search field
		$("#search").val($(this).val());
		$("#list").hide();
	});




	/* 
	* Adding the selected medicine to prescription 
	*/
	$("#addon").click( function() {
		// if all fields are filled
		if (!($("#list").val() == '' || $("input[type='radio']:checked").val() == null || $("#duration").val() == "")){
			
			// storing them in array
			medicine.push(parseInt($("#list").children(":selected").attr("id")));
			
			dose.push($("input[type='radio']:checked").val());
			
			duration.push(parseInt($("input[type='number']").val()));
			
			// appending to html
			var len = medicine.length - 1; 
			var string = "<tr><td><span id='remove_med' data-toggle='tooltip' title='Remove this medicine' class='glyphicon glyphicon-trash'></span></td><td>" + $('#list').val() + "</td><td>" + dose[len] + "</td><td>" + duration[len] + "</td></tr>";
			$('#med-table tbody').append(string);
			
			// clearing the fields for next input
			$("#search").val("");
			$(".form-check-input").prop('checked', false);
			$("#duration").val("");
		}
		else
			alert("Fill all fields first");

		// prevents the page to reload on each click (cause: taken all things inside a form|refer html)
		return false;
	});

	
	/* 
	* prescribing and sending message to patient 
	*/
	$("#prescribe").click( function(){
		
		// ensure atleast one drug is there in table
		var rowCount = $('#med-table >tbody >tr').length;		// gets the number of row in table
		if (rowCount == 0)
		{
			alert("Select drug first!");
		}
		else {

			// ============== test CAN BE IGNORED
			console.log("going.....");
			for (var i = 0; i < medicine.length; i++)
				console.log(medicine[i] + '  ' + dose[i] + '  ' + duration[i]);
			// =============== test ends


			// making a AJAX call to "saveit"
			$.ajax({
				type: "POST",
				url: "saveit.php",
				data: {medicine: medicine, dose: dose, duration: duration},
				
				success: function(msg){
					
					// copying the table for showing/print
					// https://stackoverflow.com/questions/45189541/move-copy-specific-columns-data-of-a-table-in-to-another-table-using-jquery?utm_medium=organic&utm_source=google_rich_qa&utm_campaign=google_rich_qa
					// following loop just copy the table removing the delete button
					// ADVICE : jump directly to  154th line
					for (var col = 2; col < 5; col++){
				 
						if( $('table#med-table thead tr').children().length >= col){
						   	if( $('table#print-table thead').children().length === 0 ){
						      $('table#print-table thead').append('<tr></tr>');
						    }

						    $('table#print-table thead tr').append('<th>' + 	$($('table#med-table thead tr').children()[col -1]).text() + '</th>');

						    $('table#med-table tbody tr').each(function(i){
						     if( $('table#print-table tbody').children().length != $('table#med-table tbody').children().length ){
						        $('table#print-table tbody').append('<tr></tr>');
						     }
						      $('table#print-table tbody tr:nth-child(' + (i + 1) + ')').append('<td>' + $($(this).children()[col - 1]).text() + '</tr>');
						    });
						}
					}
					
					$('body > :not(#DivIdToPrint)').hide(); 	// hide all nodes directly under the body
					$('#DivIdToPrint').appendTo('body');		// putting this div to top of body
					$('#DivIdToPrint').show();					// finally showing it

				},
				
				error: function() {
					alert("Something went wrong");
				}
			});
		}
	});


	/*
	* Remove a particular row from table
	* https://stackoverflow.com/questions/14351636/jquery-click-event-not-working-for-dynamic-fields
	* Delegated function refer above link
	*/
	$("table").on("click", "#remove_med", function () {
		// gets the row to be deleted
    	var row = $(this).closest("tr");
    		
   		var index = row.index();

   		console.log('rempved' + medicine[index] + '  ' + dose[index] + '  ' + duration[index]);

   		// remove that particular drug from the arrays
    	medicine.splice(index, 1);
    	dose.splice(index, 1);
    	duration.splice(index, 1);
    	
    	// removing it from table for the sake of prescriber
    	row.remove();
	});


	/**
	* simply goto index page for a new patient, when Conitnue button is clicked
	*/
	$("#new_patient").click( function() {
		window.location.replace("bg-Patientdetails.php");
	});


	/**
	* Prints the prescription
	*/
	$("#print_prescription").click( function () {
		$("#bottom").hide();
		window.print();
		window.location.replace("bg-Patientdetails.php");
	});

});