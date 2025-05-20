<?php if ( isset( $_FILES['image'] ) ) {
	if ($_FILES['image']['type']== "image/jpeg") {
		$source_file = $_FILES['image']['tmp_name'];
		$dest_file = "../img/Student/".$_FILES['image']['name'];

		if (file_exists($dest_file)) {
			print "The file name already exists!!";
		}
		else {
			move_uploaded_file( $source_file, $dest_file )
			or die ("Error!!");
			if($_FILES['image']['error'] == 0) {
				print "Pdf file uploaded successfully!";
			}
		}
	}
	else {
		if ( $_FILES['image']['type'] != "image/jpeg") {
			print "Error occured while uploading file : ".$_FILES['image']['name']."<br/>";
			print "Invalid  file extension, should be pdf !!"."<br/>";
			print "Error Code : ".$_FILES['image']['error']."<br/>";
		}
	}
}

// $title = $_POST['title'];
// $author = $_POST['author'];
// $publisher = $_POST['publisher'];
// $ISBN = $_POST['ISBN'];
// $pages = $_POST['pages'];
// $category = $_POST['category'];
// $year = "03-January-2007";

// $query = "INSERT INTO books (
// 	`book_title`,
// 	`book_author`,
// 	`book_pages`,
// 	`ISBN`
// 	)
// 	VALUES
// 	('$name', '$enr', '$sem', '$pic')";
// 	$result = $db->query($query);
	header("location:../home");
?>
