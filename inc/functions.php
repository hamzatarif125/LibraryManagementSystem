<?php

function check_session(){
	session_start();
	if(!isset($_SESSION['name'])) {
		header("location:welcome");
	}
}

function create_footer(){ ?>

</div> <!-- End Row -->
</div>

<div class="navbar navbar-default navbar-fixed-bottom">
	<div class="container">
		<p class="navbar-text pull-left">&copy;<?php echo date("Y"); ?> - Site Built By
			<a href="https://www.facebook.com/Shehzad47" target="_blank" >Abdul Majeed Shehzad</a>
		</p>
	</div>
</div>


</body>
</html>
<?php
}

function create_header(){ ?>
<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src= "js/jquery-3.1.1.js"></script>
	<script src= "css/bootstrap.js"></script>
	<script src="js/functions.js"></script>
</head>
<body>
	<?php
}

function create_connection(){
	$dbName 	= "booklib"	 ;
	$dbServer   = "localhost";
	$dbUserName = "root"	 ;
	$dbPassword = ""		 ;

	$db = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);

	if ($db->connect_errno)
	{
		exit("Data Base Connection Failed. Reason: " .$db->connect_error);
	}

}

