<?php
function student_modal(){ ?>
<div class="modal fade" id="stdDetail" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<!-- Modal Header-->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Please Enter The Student Details</h4>
			</div>
			<!-- Modal Body-->
			<div class="modal-body">
				<!-- Book Issue Form Form-->
				<form class="form-horizontal" id="register-form"  method="POST" action="">
					<!-- Enrollment Number-->
					<div class="form-group ">
						<div class="col-sm-12">
							<input id="enrolNum_mod" name="enrolNum_mod" type="text" placeholder="Enrollment Number" class="form-control input-md" required>
							<!-- <span id="usernameStatus" class="status"></span> -->
						</div>
					</div>
					<!-- Student Name-->
					<div class="form-group ">
						<div class="col-sm-12">
							<input id="stdName" name="stdName" type="text" placeholder="Student Name" class="form-control input-md " readonly >
						</div>
					</div>
					<!-- Date Of Issue-->
					<div class="form-group">
						<div class="col-sm-12">
							<input name="issueDate" type="hidden" readonly value="<?php echo date("Y-m-d"); ?>">

							<input id="vIssueDate" name="vIssueDate" class="form-control input-md" readonly value="<?php echo date("d-M-Y"); ?>">
						</div>
					</div>
					<!-- Due Date-->
					<div class="form-group">
						<div class="col-sm-12">
							<input name="dueDate" type="hidden" readonly value="<?php echo date('Y-m-d', strtotime("+7 days")); ?>">

							<input id="vDueDate" name="vDueDate" class="form-control input-md" readonly value="<?php echo date('d-M-Y', strtotime("+7 days")); ?>">
						</div>
					</div>
					<!-- Submit-->
					<div class="form-group">
						<div class="col-sm-6 col-lg-offset-3">
							<br>
							<button id="issueBook" name="issueBook" class="btn btn-primary btn-block">Issue</button>
						</div>
					</div>
				</form>
			</div> <!-- Modal Body End-->
			<div class="modal-footer">
				<p align="center">Not registered in Library? <a href="Student?add-new-record" >Add Record</a></p>
			</div>
		</div> <!-- Modal content End-->
	</div> <!-- Modal Dialog End-->
</div>
<?php
}


function signup_modal(){ ?>
<div class="modal fade" id="signUpModal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<!-- Modal Header-->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Please SignUp To Continue</h4>
			</div>
			<!-- Modal Body-->
			<div class="modal-body">
				<!-- Sign Up Form-->
				<form class="form-horizontal" id="register-form"  method="POST">
					<!-- Name-->
					<div class="form-group ">
						<div class="col-sm-6">
							<input id="fName" name="fName" type="text" placeholder="First Name" class="form-control input-md " required="">
							<span id="nameStatus"></span>
						</div>
						<div class="col-sm-6">
							<input id="lName" name="lName" type="text" placeholder="Last Name" class="form-control input-md" required="">
						</div>
					</div>
					<!-- User Name-->
					<div class="form-group ">
						<div class="col-sm-12">
							<input id="uName" name="uName" type="text" placeholder="User Name" class="form-control input-md" required="">
							<span id="usernameStatus" class="status"></span>
						</div>
					</div>
					<!-- Email-->
					<div class="form-group">
						<div class="col-sm-12">
							<input id="email" name="email" type="text" placeholder="Email" class="form-control input-md" required="">
							<span id="emailStatus" class="status"></span>
						</div>
					</div>
					<!-- Password-->
					<div class="form-group">
						<div class="col-sm-12">
							<input id="Npassword" name="Npassword" type="password" placeholder="Password" class="form-control input-md" required="">
						</div>
					</div>
					<!-- Confirm Password-->
					<div class="form-group">
						<div class="col-sm-12">
							<input id="Cpassword" name="Cpassword" type="password" placeholder="Confirm Password" class="form-control input-md" required="">
							<span id="passwordStatus" class="status"></span>
						</div>
					</div>
					<!-- Submit-->
					<div class="form-group">
						<div class="col-sm-12">
							<br>
							<button id="SignupSubmit" name="SignupSubmit" class="btn btn-primary btn-block dis">Sign Up</button>
						</div>
					</div>
				</form>
			</div> <!-- Modal Body End-->
			<div class="modal-footer">
				<p align="center">Already have an account ? <a href="welcome" >Log In</a></p>
			</div>
		</div> <!-- Modal content End-->
	</div> <!-- Modal Dialog End-->
</div>
<?php
}

function p_details_modal($r){
$row = $r; ?>
<div class="modal fade" id="p_details" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<!-- Modal Header-->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<h1 align="center"><?php echo $row["book_title"]; ?></h1>

			<!-- Modal Body-->
			<div class="modal-body">
				<!-- Sign Up Form-->
				<table class="table">
				<tr>
					<th>Dealer</th>
					<td>Sang-e-Meel Publications</td>
				</tr>
				<tr>
					<th>Date Of Purchase</th>
					<td>03-January-2007</td>
				</tr>
				<tr>
					<th>Price</th>
					<td>Rs.<?php echo $row["book_pages"]; ?></td>
				</tr>
			</table>
			</div> <!-- Modal Body End-->
		</div> <!-- Modal content End-->
	</div> <!-- Modal Dialog End-->
</div>
<?php
}

?>
