$(function() {

	$(".alert").hide();
	$(".getRegister").hide();

	$("#check").click (function(){
		var num = $("#phone").val();
		if (num.length == 10){
			// ajax call to verify the number
			$.ajax({
				type : "POST",
				url : "bg-Patientdetails.php",
				data : {contact: num, name : $("#name").val(), next : true},

				success : function(result){
					if (result == 1)
						location.href='prescription.php';
					else
						$(".alert").show();
						$(".getRegister").show();
						$("#check").remove();
				}
			});
		}
		else
			alert("Enter valid contact number");
		
		return false;
	});
});