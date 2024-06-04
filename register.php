<?php
include 'includes/db.php';
include 'includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['pass']; 
    $confirm_password = $_POST['cpass']; 
    $gender = $_POST['gender'];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, pass, gender) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fullname, $username, $email, $password, $gender);
        
        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Registration failed. Please try again later.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<main>
      <div class="container">
         <div class="title"><strong>Registration</strong></div>
         <form action="#" method="POST">
            <div class="user-details">
               <div class="input-box">
                  <label class="details" for="fullname">Full Name</label>
                  <input type="text" name="fullname" placeholder="Enter your name" required>
               </div>
               <div class="input-box">
               <label class="details" for="username">User Name</label>
                  <input type="text" name="username" placeholder="Enter your username" required>
               </div>
               <div class="input-box">
               <label class="details" for="email">Email</label>
                  <input type="text" name="email" placeholder="Enter your email" required>
               </div>
               <div class="input-box">
               <label class="details" for="pass">Password</label>
                  <input type="password" name="pass" placeholder="Enter your password" required>
               </div>
               <div class="input-box">
               <label class="details" for="cpass">Confirm Password</label>
                  <input type="password" name="cpass" placeholder="Confirm your password" required>
               </div>
               <div class="input-box">
                  <span class="details">Gender</span>
                  <select id="gender" name="gender" required>
                     <option value="" disabled selected>Select your gender</option>
                     <option value="Male">Male</option>
                     <option value="Female">Female</option>
                  </select>
               </div>
            </div>
            <button class="button"><strong>Submit</strong></button>
         </form>
      </div>
   </main>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
