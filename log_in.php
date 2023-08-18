<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter Email Address.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT idno, fname, lname, email, password FROM member_registration WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $idno, $fname, $lname, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["idno"] = $idno;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>


<!DOCTYPE html>
<html lang="en" class="page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Gerald Kumero">
    <title>Member Log in Form</title>
    <link rel="stylesheet" href="/styles.css">
    <link rel="shortcut icon" href="/Icons/favicon.ico" type="image/x-icon" style="width: 32px; height: 32px;">
</head>
<body>
    <!--header-->
    <header class="header" id="intro">
        <div class="brand" style="height: 140px;">
            <div class="logo">
            <img src="/Icons/the elite logo.jpeg" alt="Elite Mentors Forum" style="height: 140px; width: 160px;">
            </div>
            <div class="brand_name" style="height: 100px;">
                <a href="/elitementors.php" class="brand-link" id="main" style="color: black;"><p><span class="title">The Elite Mentors</span><br>Setting standards, trends and uplifting souls</p></a>
            </div>
        <br></div>
        <!--
        <section class="navigation">
            <nav class="navigation">                
                    <ul>
                        <li class="nav-item">
                            <img src="/Icons/home.png" alt="Homepage" style="width: 20px;height: 20px;"><a href="/elitementors.html" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="/about.html" class="nav-link">About Elite</a>
                        </li>
                        <li class="nav-item">
                            <a href="/services.html" class="nav-link">Our Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="/registration.html" class="nav-link">Registration</a>
                        </li>
                        <li class="nav-item">
                            <a href="/contact_us.html" class="nav-link">Contacts</a>
                        </li>
                    </ul>
        </nav>
        </section>
    </header>
-->

    <section id="main">
        <br><br><br><br><br>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="log_in_form" class="logform">
            <h1>Welcome To Elite Mentors</h1>
            <p style="font-size: large;">Fill in your details to log in.</p>
            <input type="text" name="email" id="email" placeholder="Email Address" required style="height: 40px; width: 300px;"><br><br><br>
            <input type="password" name="password" id="password" placeholder="Password" required style="height: 40px; width: 300px;">
        <br><br>
            <input type="submit" name="submit" id="submit" value="Log in">&nbsp;&nbsp;&nbsp;&nbsp;
            <p style="font-size: large;"><a href="/forgot_password.php">Forgot Password?</a>&nbsp;&nbsp;&nbsp;&nbsp;Do not have an account?&nbsp;&nbsp; <a href="/sign_up.php">Sign up</a></p>
        </form>
    
    </section>
</body>
</html>