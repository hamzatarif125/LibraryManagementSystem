$(function(){

	// Validating Username
	$("#uName").keyup(function(){
		var name = $(this).val();

		if(name.length > 4)
		{
			$("#usernameStatus").html('checking...');

			$.ajax({

				type : 'POST',
				url  : 'inc/validate-data.php',
				data : $(this).serialize(),
				success : function(data)
				{
					$("#usernameStatus").html(data);
				}
				}); //End of Ajax
			return false;
		}
		else
		{
			$("#usernameStatus").html('');
			$('#SignupSubmit').prop('disabled', false);
		}
	})
	.blur(function() {
		var name = $(this).val();
		if((name.length < 5 || name.length > 21) && name != ""){
			$("#usernameStatus").text("Please use between 5 and 20 characters.")
			$('#SignupSubmit').prop('disabled', true);
		}
		else if($("#usernameStatus").html().contains('available')){
			$("#usernameStatus").html("")
		}
		}); //End of Username Selector

	// Adding or Removing Has-ErrorClass From Fields
	$("#fName, #lName, #Uname, #email, #Npassword, #cPassword").blur(function() {
		if($(this).val() == ""){

			$(this).parent().addClass('has-error')
			// $('#SignupSubmit').prop('disabled', true);
		}
		else {
			$(this).parent().removeClass('has-error')
			// $('#SignupSubmit').prop('disabled', false);
		}
	})
	.focusin(function() {
		$(this).parent().removeClass('has-error')
	}); //End Of Filed Selectors

	// Validating Email
	$("#email").blur(function()
	{
		$.ajax({

			type : 'POST',
			url  : 'inc/validate-data.php',
			data : $(this).serialize(),
			success : function(data)
			{
				$("#emailStatus").html(data);
			}
		}); //End of Ajax
	}); //End Of Email Selector

	// Validating Password
	$("#Cpassword").blur(function()
	{
		if($(this).val() != $("#Npassword").val() && $(this).val() != ""){
			$('#SignupSubmit').prop('disabled', true);
			$.ajax({
				type : 'POST',
				url  : 'inc/validate-data.php',
				data : $(this).serialize(),
				success : function(data)
				{
					$("#passwordStatus").html(data);
				}
			}); //End of Ajax
		}
	}); //End Confirm Password Selector

	$("#Npassword").focusin(function() {
		$("#Cpassword").val("")
		$("#passwordStatus").html("")
		$('#SignupSubmit').prop('disabled', false);
	});

	$("#enrolNum").keyup(function(){
		var enr = $(this).val();

		if(enr.length > 14)
		{
			$("#enrolNumStatus").html('checking...');

			$.ajax({

				type : 'POST',
				url  : 'inc/validate-data.php',
				data : $(this).serialize(),
				success : function(data)
				{
					$("#enrolNumStatus").html(data);
				}
				}); //End of Ajax
			return false;
		}
		else
		{
			$("#enrolNumStatus").html('');
			$('#regStd').prop('disabled', false);
		}
	})
	.blur(function() {
		var enr = $(this).val();
		if(enr.length < 15  && enr != ""){
			$("#enrolNumStatus").text("Invalid Enrollment Number")
			$('#regStd').prop('disabled', true);
		}
		});
	$("#semester").blur(function(){
		var sem = $(this).val();
		if (sem.length > 1 || sem.text == "0" || sem.text() == "9" ){
			$("#semStatus").text("Please Enter Semester Between 1 and 9")
		}
	});

	$("#enrolNum_mod").keyup(function(){
		var enr = $(this).val();

		if(enr.length > 13)
		{
			$.ajax({

				type : 'POST',
				url  : 'inc/validate-data.php',
				data : $(this).serialize(),
				success : function(data)
				{
					$("#stdName").val(data);
				}
				}); //End of Ajax
			return false;
		}

	})
	.blur(function(event) {
		if ($("#stdName").val() == "")
			{$('#issueBook').prop('disabled', true)}
		if ($("#stdName").val() != "") {
			$('#issueBook').prop('disabled', false)
		}
	});

});