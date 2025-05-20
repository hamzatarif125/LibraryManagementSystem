<?php
include 'Connection.php';

if (isset($_POST['uName'])) {
	$name = $_POST['uName'];

	$query = "SELECT * FROM `users` WHERE `user_name` = \"$name\"";
	$result = $db->query($query);
	$count = $result->num_rows;

	if($count>0)
	{
		echo "
		<span class='status'>
			Sorry username already exist
			<span class=\"glyphicon glyphicon-remove\"></span>
		</span>";
	}

	elseif (!preg_match('/^[A-Za-z][A-Za-z0-9]{4,21}$/', $name)) {
		echo "
		<span class='status'>
			Invalid Username
			<span class=\"glyphicon glyphicon-remove\"></span>
		</span>";
	}
	else
	{
		echo "
		<span style='color:green;'>
			available
			<span class=\"glyphicon glyphicon-ok \"></span>
		</span>";
	}
}

if (isset($_POST['email'])) {
	$email = $_POST['email'];

	$query = "SELECT * FROM `users` WHERE `email_id` = \"$email\"";
	$result = $db->query($query);
	$count = $result->num_rows;

	if($count>0)
	{
		echo "
		<span class='status'>
			Email already in use
			<span class=\"glyphicon glyphicon-remove\"></span>
		</span>";
	}

	elseif (filter_var($email,FILTER_VALIDATE_EMAIL) === false AND $email != "") {
		echo "
		<span class='status'>
			Invalid Email
			<span class=\"glyphicon glyphicon-remove\"></span>
		</span>";
	}
	elseif($email = "")
	{
		echo "You can't leave this empty";
	}
	else
	{
		echo "";
	}
}

if (isset($_POST['Cpassword']) ) {
	echo "
	<span class='status'>
		Passwords don't match.
		<span class=\"glyphicon glyphicon-remove \"></span>
	</span>";
}

if (isset($_POST['enrolNum'])) {
	$enr = $_POST['enrolNum'];

	$query = "SELECT * FROM `students` WHERE `std_enr_no` = \"$enr\"";
	$result = $db->query($query);
	$count = $result->num_rows;

	if($count>0)
	{
		echo "
		<span class='status'>
			This Student Is Already Registered
			<span class=\"glyphicon glyphicon-remove\"></span>
		</span>";
	}

	elseif (!preg_match('/[0-9]{4}\/[A-Za-z]{2}\/[A-Za-z]{2}\/[M,E,m,e]\/[0-9]{2}/', $enr)) {
		echo "
		<span class='status'>
			Invalid Enrollment Number
		</span>";
	}
}

if (isset($_POST['enrolNum_mod'])) {
	$enr = $_POST['enrolNum_mod'];

	$query = "SELECT * FROM `students` WHERE `std_enr_no` = \"$enr\";";
	$result = $db->query($query);
	$count = $result->num_rows;

	if($count>0)
	{
		$row = $result->fetch_assoc();
		$name = $row["std_name"];
		echo $name;
	}
}




?>