<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$fname = $lname = $email =  $idno = $password = $confirm_password = "";
$fname_err = $lname_err = $email_err = $idno_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate firstname
    if(empty(trim($_POST["fname"]))){
        $fname_err = "Please enter your first name.";
    } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["fname"]))){
        $fname_err = "Names can only contain letters.";
    } else{
        $fname = trim($_POST["fname"]);
    }

    // Validate lastname
    if(empty(trim($_POST["lname"]))){
        $lname_err = "Please enter your last name.";
    } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["lname"]))){
        $lname_err = "Names can only contain letters.";
    } else{
        $lname = trim($_POST["lname"]);
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email address.";
    } elseif(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Validate idno
    if(empty(trim($_POST["idno"]))){
        $idno_err = "Please enter your ID No.";
    } elseif(!preg_match('/^[0-9]+$/', trim($_POST["idno"]))){
        $idno_err = "ID No. can only contain numeric characters.";
    } else{
        $idno = trim($_POST["idno"]);
    }
            
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["cpassword"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["cpassword"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($fname_err) && empty($lname_err) && empty($email_err) && empty($idno_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO member_registration VALUES (fname, lname, email, idno, password) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_fname, $param_lname, $param_email, $param_idno, $param_password );
            
            // Set parameters
            $param_fname = $fname;
            $param_lname = $lname;
            $param_email = $email;
            $param_idno = $idno;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
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
    <title>Sign up Form</title>
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

    <section id="main2">
        <br><br>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" name="signup_form" class="signform">
            <h1>Welcome To Elite Mentors</h1>
            <p style="font-size: large;">Join us by signing up below.</p>
            <input type="text" name="fname" id="fname" placeholder="First Name" required style="height: 40px; width: 300px;"><br><br>
            <input type="text" name="lname" id="lname" placeholder="Last Name" required style="height: 40px; width: 300px;"><br><br>
            <input type="email" name="email" id="email" placeholder="Email Address" required style="height: 40px; width: 300px;"><br><br>
            <input type="text" name="idno" id="idno" placeholder="ID No." required style="height: 40px; width: 300px;"><br><br><br>
            <input type="password" name="password" id="password" placeholder="Password" required style="height: 40px; width: 300px;"><br><br>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" required style="height: 40px; width: 300px;"><br><br>
            <input type="submit" name="submit" id="submit" value="Sign up">&nbsp;&nbsp;&nbsp;&nbsp;
            <p style="font-size: large;">Already have an account?&nbsp;<a href="/log_in.php">Log in</a>
            </p>
        </form>
    
    </section>
</body>
</html>