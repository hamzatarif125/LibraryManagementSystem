<?php
$pageTitle = "Records";

require 'inc/session.php';
include 'inc/header.php';
include 'inc/Connection.php'; ?>

<?php
if ($_SERVER['QUERY_STRING'] == "books"){
	$query = "SELECT s.* , b.*, bi.* FROM students as s , books as b, books_issued as bi where b.`book_ID` = bi.`book_ID` AND s.`std_id` = bi.`std_id`";
	$result = $db->query($query);
	$count = $result->num_rows;
	if ($count > 0) { ?>
	<table class="table">
		<thead>
			<tr>
				<th></th>
				<th>Title</th>
				<th>Author</th>
				<th>Issued To</th>
				<th>Return Date</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = $result->fetch_assoc())
			{
				// $id = $row["book_ID"];
				printf("
				       <tr>
				       	<td>  </td>
				       	<td> %s </td>
				       	<td> %s </td>
				       	<td> %s </td>
				       	<td> %s </td>
				       </tr>",
				       htmlentities($row["book_title"]),
				       htmlentities($row["book_author"]),
				       htmlentities($row["std_name"]),
				       htmlentities($row["due_date"])
				       );
			}
			?>
		</tbody>
	</table>
	<?php }
	else { ?>
	<div class="col-sm-12">
		<div class="alert alert-warning"><p align="center">No Books Are Issued Yet !</p></div>
	</div>
	<?php }
} ?>

<?php if ($_SERVER['QUERY_STRING'] == "students"){
	$query = "SELECT DISTINCT
	s.`std_name`,
	s.`std_sem`,
	s.`std_id`
	FROM
	students AS s,
	books_issued AS bi
	WHERE s.`std_id` = bi.`std_id` ";
	$result = $db->query($query);
	$count = $result->num_rows;
	if ($count > 0) { ?>
	<div align="center">
		<table class="table">
			<thead>
				<tr>
					<th>Student #</th>
					<th>Name</th>
					<th>Semester</th>
					<th>No Of books</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php
				while($row = $result->fetch_assoc())
				{
					$id = $row["std_id"];
					$book_count = $db->query("SELECT
					                         COUNT(bi.`book_ID`) AS books
					                         FROM
					                         `books_issued` AS bi,
					                         students AS s
					                         WHERE s.`std_id` = bi.`std_id` AND s.`std_id` = $id");
					$book_count_result = $book_count->fetch_assoc();
					printf("
					       <tr>
					       	<td> %s </td>
					       	<td> %s </td>
					       	<td> %s </td>
					       	<td> %s </td>
					       	<td>
					       		<a href ='student?id=$id'><input type='button' name='details' value='View Details' class='btn'></a>
					       	</td>
					       </tr>",
					       htmlentities($row["std_id"]),
					       htmlentities($row["std_name"]),
					       htmlentities($row["std_sem"]),
					       htmlentities($book_count_result["books"])
					       );
				}
				?>
			</tbody>
		</table>
	</div>
	<?php }
	else { ?>
	<div class="col-sm-12">
		<div class="alert alert-warning"><p align="center">No Books Are Issued To Any Student Yet.</p></div>
	</div>
	<?php }
} ?>

<?php if ($_SERVER['QUERY_STRING'] == "defaulters"){
	$cDate = date("Y-m-d");
	$query = "SELECT DISTINCT
	s.`std_name`,
	s.`std_id`
	FROM
	students AS s,
	books_issued AS bi
	WHERE s.`std_id` = bi.`std_id`
	AND bi.`due_date` < DATE('$cDate')";
	$result = $db->query($query);
	$count = $result->num_rows;
	if ($count > 0) { ?>
	<table class="table">
		<thead>
			<tr>
				<th>Student Name</th>
				<th>Books Overdue</th>
				<!-- <th>Due Date</th> -->
				<th>Overdue</th>
				<th>Fine</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = $result->fetch_assoc())
			{
				$id = $row["std_id"];
				$name = $row["std_name"];
				$countResult = $db->query("SELECT
				                          COUNT(bi.`book_ID`) as books
				                          FROM
				                          `books_issued` AS bi,
				                          students AS s
				                          WHERE s.`std_id` = bi.`std_id`
				                          AND s.`std_name` = '$name'
				                          AND bi.`due_date` < DATE('$cDate')");
				$count = $countResult ->fetch_assoc();
				$overdue = $db->query("SELECT
				                      DATEDIFF(DATE ('$cDate'), DATE (bi.`due_date`)) AS DiffDate
				                      FROM
				                      `books_issued` AS bi,
				                      students AS s
				                      WHERE s.`std_id` = bi.`std_id`
				                      AND s.`std_name` = '$name'");
				$tot = 0;
				while ($DaysOverDue = $overdue ->fetch_assoc()) {
					$tot += $DaysOverDue['DiffDate'];
				}
				$fine = $tot * 15;
				printf("
				       <tr>
				       	<td> %s </td>
				       	<td> %s </td>
				       	<td> $tot Days </td>
				       	<td> Rs. $fine </td>
				       	<td>
				       		<a href ='report?defaulters&id=$id'><input type='button' value='View Details' class='btn'></a>
				       	</td>
				       </tr>",
				       htmlentities($row["std_name"]),
				       htmlentities($count["books"])
				       );
			}
			?>
		</tbody>
	</table>
	<?php }
	else { ?>
	<div class="col-sm-12">
		<div class="alert alert-warning"><p align="center">There Are No Defaulters Yet.</p></div>
	</div>
	<?php }
} ?>

<?php if (isset($_GET["id"])){
	$cDate = date("Y-m-d");
	$id = $_GET["id"];
	$query = "SELECT
	s.`std_name`,
	s.`std_id`,
	bi.`due_date`,
	DATEDIFF(DATE ('$cDate'), DATE (bi.`due_date`)) AS DiffDate,
	b.`book_title`
	FROM
	students AS s,
	books AS b,
	books_issued AS bi
	WHERE s.`std_id` = $id
	AND s.`std_id` = bi.`std_id`
	AND b.`book_ID` = bi.`book_ID`
	AND bi.`due_date` < DATE('$cDate')";

	$result = $db->query($query);
	$count = $result->num_rows;

	if ($count > 0) {
	$std = $db->query("SELECT `std_name` FROM students WHERE `std_ID` = $id");
	$name = $std->fetch_assoc();
	?>
	<table class="table">
		<thead>
			<tr>
				<h1 align="center"><a href="student?id=<?php echo $id; ?>"><?php echo $name['std_name']; ?></a></h1>
			</tr>
			<tr>
				<th>Book Name</th>
				<th>Due Date</th>
				<th>Days Overdue</th>
				<th>Fine</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = $result->fetch_assoc())
			{
				$fine = $row['DiffDate'] * 15;
				// $id = $row["std_id"];
				printf("
				       <tr>
				       	<td> %s </td>
				       	<td> %s </td>
				       	<td> %s </td>
				       	<td> Rs. $fine </td>
				       </tr>",
				       htmlentities($row["book_title"]),
				       htmlentities($row["due_date"]),
				       htmlentities($row["DiffDate"])
				       );
			}
			?>
		</tbody>
	</table>
	<?php }
} ?>


<?php include 'inc/footer.php'; ?>