<?php
$pageTitle = "Details";

require 'inc/session.php';
include 'inc/header.php';
include 'inc/Connection.php';
include 'inc/modals.php'
?>

<?php
if(isset($_GET["id"])){

	$id = $_GET{"id"};
	if (isset($_POST['issueBook'])) {
		$enr = $_POST["enrolNum_mod"];
		$query = "SELECT * FROM `students` WHERE `std_enr_no` = '$enr'";
		$result = $db->query($query);
		$std = $result->fetch_assoc();
		$std_id = $std["std_id"];
		$std_name = $std["std_name"];
		$status = "Issued To ".$std_name;
		$i_date = $_POST["issueDate"];
		$d_date = $_POST["dueDate"];
		$query = "UPDATE `books` SET `book_status` = '$status' WHERE `book_ID` = $id";
		$db->query($query);
		// echo $i_date;
		$query = "INSERT INTO `books_issued`(`std_id`, `book_ID`, `issue_date`, `due_date`) VALUES ($std_id,$id,'$i_date','$d_date')";
		$result = $db->query($query);
		header("location:details.php?id=$id");
	}
	if (isset($_GET["action"])) {
		$query = "UPDATE `books` SET `book_status` = 'Available' WHERE `book_ID` = $id";
		$db->query($query);
		$query = "DELETE FROM `books_issued` WHERE `book_ID` = $id";
		$db->query($query);
		header("location:details.php?id=$id");
	}
	$query = "SELECT
	b.*,
	c.`cat_name`
	FROM
	books AS b,
	categories AS c
	WHERE b.`cat_ID` = c.`cat_id`
	AND b.`book_ID` = $id ";

	$result = $db->query($query);
	$row = $result->fetch_assoc();
	?>

	<div class=" col-xs-12 col-sm-6 col-md-6" align="center">
		<img src="<?php echo $row["book_img"];?>" alt="<?php echo $row["book_title"];?>" class = "img-responsive thumbnail" width="380"/>
	</div>

	<div class="col-xs-12 col-sm-6 col-md-6" >

			<h1 align="center"><?php echo $row["book_title"]; ?></h1>
			<table class="table">

				<tr>
					<th>Author</th>
					<td><?php echo $row["book_author"]; ?></td>
				</tr>
				<tr>
					<th>Publisher</th>
					<td>Sang-e-Meel Publications</td>
				</tr>
				<tr>
					<th>Year Of Publish</th>
					<td>03-January-2007</td>
				</tr>
				<tr>
					<th>ISBN</th>
					<td><?php echo $row["ISBN"]; ?></td>
				</tr>
				<tr>
					<th>No Of Pages</th>
					<td><?php echo $row["book_pages"]; ?></td>
				</tr>
				<tr>
					<th>Category</th>
					<td><?php echo $row["cat_name"]; ?></td>
				</tr>
				<tr>
					<th>Status</th>
					<td><?php echo $row["book_status"]; ?></td>
				</tr>
			</table>

			<div>
				<?php if ($row["book_status"] == "Available"){ ?>
				<a href= "#" data-toggle="modal" data-target="#stdDetail" >
					<button class="btn">Issue Book</button>
				</a>
				<?php } else { ?>
				<a href= <?php echo "details.php?id=$id&action=return" ?> id="return" >
					<button class="btn">Return Book</button>
				</a>
				<?php }?>
				<a href= "#" data-toggle="modal" data-target="#p_details">
					<button class="btn">Purchase Details</button>
				</a>
			</div>
	</div>

	<?php
	student_modal();
	p_details_modal($row);
} ?>



	<?php include 'inc/footer.php'; ?>