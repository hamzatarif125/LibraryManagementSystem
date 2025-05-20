<div class="container">
    <?php
    if(isset($_POST["Fsubmit"])){
        $name = addslashes(strtolower($_POST["username"]));
        $pass = $_POST["password"];

        $query = "SELECT * FROM `users` WHERE `user_name` = \"$name\"";
        $result = $db->query($query);
        $num = $result->num_rows;
        if($num == 1){
            while ($row = $result->fetch_assoc()) {
                if(strtolower($row["user_name"]) == $name AND $row["user_password"] == $pass){
                    $_SESSION["name"]=$name;
                    header("location:home");
                    exit();
                }
                else {
                    if(($row["user_password"]) != $pass)
                        echo"
                    <div class=\"alert alert-danger col-md-8 col-sm-8 col-sm-offset-2\">
                        <p><strong>Warning!</strong> Invalid Password </p>
                    </div>";
                }
            }
        }
        else
            echo"
        <div class=\"alert alert-danger col-md-8 col-sm-8 col-sm-offset-2\">
            <p><strong>Warning!</strong> Invalid Username </p>
        </div>";
    } ?>
    <form class="form-horizontal" id="login-form" action="welcome" method="POST">

        <div class="thumbnail-container container col-sm-8 col-sm-offset-2">

            <!-- Form Name -->
            <legend>Please Log In To Continue</legend>
            <!-- Input User Name-->
            <div class="col-md-6 col-md-offset-3 ">
                <label class="control-label" for="username" >Username</label>
                <input id="username" name="username" type="text" placeholder="Username or Email" class="form-control input-md" required="">
                <!-- <span class="error text-danger">Some Errors related to something..</span> -->
            </div>
            <!-- Input Password-->
            <div class="col-md-6 col-md-offset-3 ">
                <label class="control-label" for="password">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required="">
            </div>
            <!-- Button -->
            <div class="col-md-6 col-md-offset-3 ">
                <br>
                <button id="Fsubmit" name="Fsubmit" class="btn btn-primary btn-block">Log In</button>
                <hr>
                <p align="center">Don't have an account ? <a href="#" data-toggle="modal" data-target="#signUpModal">Sign Up</a></p>
            </div>
        </div>
    </form>
</div>