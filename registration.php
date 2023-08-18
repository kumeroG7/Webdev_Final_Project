
<!DOCTYPE html>
<html lang="en" class="page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
    <link rel="stylesheet" href="/styles.css">
    <link rel="shortcut icon" href="/Icons/favicon.ico" type="image/x-icon" style="width: 32px; height: 32px;">
</head>
<body>

    <!--header-->
    <?php
      include "header.php";
    ?>

      <!--registration-->
 <h2 class="heads" id="three">Join our Community</h2>
 <p class="paragraphs" id="paragraph3">
     To further interact with our services, and contact our department leaders, take time to fill out the registration
     form below, we look forward to initiate you in our community:
 </p>
 <section class="regmain">
     <!--registration form-->
     <form action="/submit_form.php" method="post" target="_self" name="registration-form">
         <legend id="form-name">Registration Form</legend><br>
         <fieldset class="fieldsets">
             <legend class="legends">Personal Profile</legend>
             <label class="form-labels" for="fname">First Name:</label><br>
             <input type="text" id="fname" name="fname" required><br><br>
             <label class="form-labels" for="lname" >Last Name:</label><br>
             <input type="text" id="lname" name="lname" required><br><br>
             <label for="idno" class="form-labels">ID No.</label><br>
             <input type="text" name="idno" id="idno" required maxlength="10"><br>
         </fieldset><br>

         <fieldset class="fieldsets">
             <legend class="legends">Location</legend>
             <label class="form-labels" for="country">Country</label><br>
             <input type="text" name="country" id="country" required value="Kenya"><br><br>
             <label for="city" class="form-labels">City</label><br>
             <input type="text" name="city" id="city"><br>
         </fieldset><br>

         <fieldset class="fieldsets">
             <legend class="legends">Contact Information</legend>
             <label for="email" class="form-labels">Email Address</label><br>
             <input type="email" name="email" id="email" placeholder="example@gmail.com" required><br><br>
             <label for="telno" class="form-labels">Telephone no.</label><br>
             <input type="tel" name="telno" id="telno" pattern="+000 (000)-00 000" required><br><br>
             <label for="address1" class="form-labels">Address Line 1</label><br>
             <input type="text" name="address1" id="address1" required><br><br>
             <label for="address2" class="form-labels">Address Line 2</label><br>
             <input type="text" name="address2" id="address2"><br><br>
             <label for="town" class="form-labels">Town</label><br>
             <input type="text" name="town" id="town" required><br>
         </fieldset><br>

         <fieldset class="fieldsets">
             <legend class="legends">Your Interest in the Organisation</legend>
             <legend>Select the services you are interested in:</legend>
             <input type="checkbox" name="financial" id="financial">
             <label for="finance" class="form-labels">Financial Training</label><br>
             <input type="checkbox" name="education" id="education">
             <label for="education" class="form-labels">Education Planning</label><br>
             <input type="checkbox" name="physical" id="physical">
             <label for="physical" class="form-labels">Physical Fitness</label><br>
             <input type="checkbox" name="stress" id="stress">
             <label for="stress" class="form-labels">Stress Management</label><br>
             <input type="checkbox" name="lead" id="lead">
             <label for="lead" class="form-labels">Leadership Training</label><br><br>

             <label for="interest" class="form-labels">Briefly describe why you decided to reach out to us:</label><br>
             <textarea name="interest" id="interest" cols="30" rows="10" required></textarea><br><br>

             <label for="media" class="form-labels">How did you learn about us:</label><br>
             <select name="media" id="media" ><br>
                 <option value="google">Google</option><br>
                 <option value="facebook">Facebook</option><br>
                 <option value="TV ad">TV Advert</option><br>
                 <option value="friend"> Friend or Relative</option><br>
                 <option value="Other">Other</option><br>
             </select><br><br>

             <label for="ambition" class="form-labels">What differnce will you bring to our organisation?</label><br>
             <textarea name="ambition" id="ambition" cols="30" rows="10"></textarea><br><br>

             <legend class="legends">Any other way you would like to help us...</legend>

             <input type="checkbox" name="finance" id="finance">
             <label for="finance" class="form-labels">Finance</label><br>

             <input type="checkbox" name="asset" id="asset">
             <label for="asset" class="form-labels">Assets</label><br>

             <input type="checkbox" name="trainer" id="trainer">
             <label for="trainer">Be a trainer or Mentor</label><br>
         </fieldset><br>

         <input type="Submit" value="Submit" id="submit" formaction="/submit_form.php"><br>
     </form><br>
</section>
   
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
