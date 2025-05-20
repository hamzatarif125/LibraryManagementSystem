<?php
$pageTitle = "Add Student";

require 'inc/session.php';
include 'inc/header.php';
include 'inc/Connection.php';
// include 'inc/pagination.php';

// if ( isset( $_FILES['image'] ) ) {
// 		echo "string";
// 		if ($_FILES['image']['type']== "image/jpeg") {
// 			$source_file = $_FILES['Stdimage']['tmp_name'];
// 			$dest_file = "../img/Student/".$_FILES['Stdimage']['name'];
// 			if (!file_exists($dest_file)) {
// 				move_uploaded_file( $source_file, $dest_file );
// 			}
// 			$pic = "img/student/".$_FILES['Stdimage']['name'];
// 			echo $pic;
// 			$query = "INSERT INTO students (`std_photo`) VALUES ('$pic')";
// 			$result = $db->query($query);
// 		}
// 	}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
// var_dump($_FILES);


	$name = $_POST["stdName"];
	$enr = $_POST["enrolNum"];
	$sem = $_POST["semester"];
	$pic = "img/student/default.jpg";

	$query = "INSERT INTO students (
	`std_name`,
	`std_enr_no`,
	`std_sem`,
	`std_photo`
	)
	VALUES
	('$name', '$enr', '$sem', '$pic')";
	$result = $db->query($query);
	header("location:student");
}

if ($_SERVER['QUERY_STRING'] == "add-new-record" ) { ?>
<form class="form-horizontal" id="register-form"  action="student" method="POST">
	<div class="well container col-sm-8 col-sm-offset-2">
		<!-- Form Name -->
		<legend>Student Details</legend>
		<!-- Stduent Name-->
		<div class="form-group ">
			<div class="col-md-6 col-md-offset-3">
				<input id="stdName" name="stdName" type="text" placeholder="Student Name" class="form-control input-md " required="">
			</div>
		</div>
		<!-- Enrollment Number-->
		<div class="form-group ">
			<div class="col-md-6 col-md-offset-3">
				<input id="enrolNum" name="enrolNum" type="text" placeholder="Enrollment Number" class="form-control input-md" required="">
				<span id="enrolNumStatus" class="status"></span>
			</div>
		</div>
		<!-- Semester-->
		<div class="form-group ">
			<div class="col-md-6 col-md-offset-3">
				<input id="semester" name="semester" type="text" placeholder="Semester" class="form-control input-md" required="">
				<span id="semStatus" class="status"></span>
			</div>
		</div>
		<!-- Image -->
		<!-- <div class="form-group">
			<div class="col-md-6 col-md-offset-3 ">
				<label for="image">Student Picture</label>
				<input type="file" name="image"/>
			</div>
		</div> -->

		<!-- Submit-->
		<div class="form-group">
			<div class="col-md-6 col-md-offset-3">
				<br>
				<button id="regStd" name="regStd" class="btn btn-primary btn-block">Register</button>
			</div>
		</div>
	</div>
</form>
<?php }
else {
if (isset($_GET["id"]) ) { //Start Outer If
	$id = $_GET{"id"};
	$query = "SELECT s.* ,  COUNT(b.`std_id`) as no_of_books FROM students as s , books_issued as b where b.`std_ID` = s.`std_ID` AND s.`std_id`=$id";
	$result = $db->query($query);
	$row = $result->fetch_assoc();
	?>
	<div class=" col-xs-12 col-sm-6 col-md-6" >
		<img src="<?php echo $row["std_photo"];?>" alt="<?php echo $row["std_name"];?>" class = "img-responsive thumbnail" width="380"/>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6">

		<h1 align="center"><?php echo $row["std_name"]; ?></h1>
		<table class="table">

			<tr>
				<th>Enrollment Number</th>
				<td><?php echo $row["std_enr_no"]; ?></td>
			</tr>
			<tr>
				<th>Date Of Registration</th>
				<td>03-January-2015</td>
			</tr>
			<tr>
				<th>Semester</th>
				<td><?php echo $row["std_sem"]; ?></td>
			</tr>
			<tr>
				<th>Number Of Books Issued</th>
				<td><?php echo $row["no_of_books"]; ?></td>
			</tr>
		</table>
	</div>
	<?php
	if ($row["no_of_books"] < 1){ ?> <!-- Start Of Inner If -->
	<div class="col-sm-12">
		<div class="well"><p align="center">No Book Is Issued To This Student Yet.</p></div>
	</div><?php
	} //End Of Inner If
	else { ?> <!-- Start Of Inner Else -->
	<div class="col-sm-12">
		<h2>Books Issued To <?php echo $row["std_name"]; ?> :</h2>
		<table class="table">
			<thead>
				<tr>
					<th></th>
					<th>Title</th>
					<th>Author</th>
					<th>Return Date</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT s.* , b.*, bi.* FROM students as s , books as b, books_issued as bi where b.`book_ID` = bi.`book_ID` AND s.`std_id` = bi.`std_id` AND s.`std_id`=$id";
				$result = $db->query($query);
				while($row = $result->fetch_assoc())
				{
					$id = $row["book_ID"];
					printf("
					       <tr>
					       	<td>  </td>
					       	<td> %s </td>
					       	<td> %s </td>
					       	<td> %s </td>
					       	<td>
					       		<a href ='details.php?id=$id&action=return'><input type='button' value='Return Now' class='btn'></a>
					       	</td>

					       </tr>",
					       htmlentities($row["book_title"]),
					       htmlentities($row["book_author"]),
					       htmlentities($row["due_date"])
					       );
				}
				?>
			</tbody>
		</table>
	</div><?php
	} //End Of Inner Else
} //End Outer If
else { ?> <!-- Start Outer Else -->
<div class = "col-md-8 col-sm-offset-2">
	<table class="table">
		<thead>
			<tr>
				<th>Student #</th>
				<th>Name</th>
				<th>Semester</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = "SELECT * FROM students;";
			$result = $db->query($query);
			while($row = $result->fetch_assoc())
			{
				$id = $row["std_id"];
				printf("
				       <tr>
				       	<td> %s </td>
				       	<td> %s </td>
				       	<td> %s </td>
				       	<td>
				       		<a href ='student?id=$id'><input type='button' name='details' value='View Details' class='btn'></a>
				       	</td>
				       </tr>",
				       htmlentities($row["std_id"]),
				       htmlentities($row["std_name"]),
				       htmlentities($row["std_sem"])
				       );
			}
			?>
		</tbody>
	</table>
</div><?php
}
} ?> <!-- End Of Outer Else -->

<?php include 'inc/footer.php'; ?>