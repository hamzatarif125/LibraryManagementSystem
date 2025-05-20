<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src= "js/jquery-3.1.1.js"></script>
	<script src= "css/bootstrap.js"></script>
	<script src="js/functions.js"></script>
	<script src="js/validation.js"></script>
</head>

<?php
require_once 'inc/Connection.php';
?>

<body>

	<nav class="navbar navbar-default ">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-menu" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" id="brand" href="index.php"></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav" id="top-nav-menu">
					<li class="active"><a href="home">Home</a></li>
					<li><a href="addbooks.php">Add Book</a></li>
					<li><a href="student">Students</a></li>
					<li class="dropdown">
					<a href="report" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="report?books">Issued Books</a></li>
							<li><a href="report?students">Students Who Have Books</a></li>
							<li><a href="report?defaulters">Defaulters</a></li>
						</ul>
					</li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="inc/logout" id="login-btn">Log Out</a></li>
				</ul>

				<form class="navbar-form navbar-right" action="index.php" method="POST">
					<div class="form-group">
						<input type="text" name="searchtitle" class="form-control" placeholder="Title">
						<input type="text" name="searchauthor" class="form-control" placeholder="Author">
						<button type="submit" class="btn btn-default">Search</button>
					</div>
				</form>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="container ">
		<div class="row" id="content">


