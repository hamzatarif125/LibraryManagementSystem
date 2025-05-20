<?php
$pageTitle = "Welcome - Log In or Sign Up"; ?>

<html>
<head>
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src= "js/jquery-3.1.1.js"></script>
    <script src= "css/bootstrap.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/validation.js"></script>
</head>
<body>
    <div class="navbar navbar-default welcome-header"></div>

    <?php
    require_once 'inc/Connection.php';
    include 'inc/modals.php';


    session_start();

    if(isset($_POST['SignupSubmit'])){
        $userName = $_POST["uName"];
        $password = $_POST["password"];
        $email = $_POST["email"];
    // $userName = $_POST["uName"];
        $query = "INSERT INTO `users`(`user_name`, `email_id`, `user_password`) VALUES (\"$userName\", \"$email\", \"$password\") ;";
        $db->query($query);
        echo"
        <div class=\"alert alert-success col-sm-8 col-sm-offset-2\">
            <p><strong>Congratulations!</strong> Your Account Is Registered Successfully. <a href=\"welcome\" >Log In</a> To Continue </p>
        </div>";
        header("location:welcome");
        exit();
    }
    if(isset($_SESSION['name']))
        header("location:home");

    ?>

    <!-- Includes Code For Log In Form -->
    <?php include 'inc/LogIn.php'; ?>
    <!-- Includes Code For Sign Up Form -->
    <?php signup_modal(); ?>


    <?php
    include 'inc/footer.php';
    ?>