<?php
$pageTitle = "Add a Book";
require 'inc/session.php';
include_once 'inc/header.php';
include 'inc/Connection.php';
?>
<div class="container">
	<form class="form-horizontal" action="inc/upload.php" method="POST" enctype="multipart/form-data">

			<!-- Form Name -->
			<legend>Add New Book</legend>

			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="title" ></label>
				<div class="col-md-5">
					<input id="title" name="title" type="text" placeholder="Book Title" class="form-control input-md" required>
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="author"></label>
				<div class="col-md-5">
					<input id="author" name="author" type="text" placeholder="Author" class="form-control input-md" required>
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="publisher"></label>
				<div class="col-md-5">
					<input id="publisher" name="publisher" type="text" placeholder="Publisher" class="form-control input-md" required>
				</div>
			</div>
			<!-- Text input-->
			<!-- <div class="form-group">
				<label class="col-md-4 control-label" for="author"></label>
				<div class="col-md-5">
					<input id="author" name="author" type="text" placeholder="Year Of Publish" class="form-control input-md" required>
				</div>
			</div> -->
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="ISBN"></label>
				<div class="col-md-5">
					<input id="ISBN" name="ISBN" type="text" placeholder="ISBN" class="form-control input-md" required>
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="pages"></label>
				<div class="col-md-5">
					<input id="pages" name="pages" type="text" placeholder="No Of Pages" class="form-control input-md" required>
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label" for="category"></label>
				<div class="col-md-5">
					<input id="category" name="category" type="text" placeholder="Category" class="form-control input-md" required>
				</div>
			</div>
			<!-- Text input-->
			<div class="form-group">
				<label class="col-md-4 control-label"></label>
				<div class="col-md-5">
					<input type="file" name="image"/>
				</div>
			</div>

			<!-- Button -->
			<div class="form-group">
				<label class="col-md-4"></label>
				<div class="col-md-4">
					<button id="Fsubmit" name="Fsubmit" class="btn btn-primary">Submit</button>
				</div>
			</div>

	</form>

</div>
<?php include 'inc/footer.php'; ?>