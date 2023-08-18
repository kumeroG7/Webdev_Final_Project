
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to Elite</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<?php
      include "header.php";
    ?>

    <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["fname"]); ?></b>. Welcome to Elite Mentors.</h1>
    <p style="text-align: center;">
        <a href="/elitementors.php" class="homepage" style="text-decoration: none;">Go to Home Page</a>
        <a href="reset-password.php" class="btn btn-warning" style="text-decoration: none;">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger ml-3" style="text-decoration: none;">Sign Out of Your Account</a>
    </p>

     <!--contact us-->
     <footer class="footer" id="end">
        <h2 class="heads" id="four">Reach out to us for Any Inquiries</h2>
    <div class="address-container">
        <address id="tel">
            <img src="/Icons/phone.svg" alt="Phone" style="height: 20px;width: 20px;">25472687345 <br>
            <img src="/Icons/phone.svg" alt="Phone" style="height: 20px;width: 20px;">254103456211 <br>
            <strong>Email: </strong> <img src="/Icons/email.svg" alt="Email" style="height: 20px;"><a href="malito:elitementorscout@self.org" id="email-link">elitementorscout@self.org</a> <br>
            <img src="/Icons/twitter.svg" alt="twitter" style="width: 20px; height: 20px;"> @elite_mentor <br>
            <img src="/Icons/instagram.svg" alt="instagram" style="width: 20px;height: 20px;"> @elite_mentor.scout <br>
            <img src="/Icons/threads-by-instagram-logo-20008C5295-seeklogo.com.png" alt="threads" style="width: 20px;height: 20px;"> @elite_mentor.scout <br>
            <img src="/Icons/facebook.svg" alt="facebook" style="width: 20px;height: 20px;"> The Elite Libraries <br>
        </address>
    </div>
    </footer>
</body>
</html>

