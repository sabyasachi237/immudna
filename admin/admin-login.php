<?php
include '../config.php'; // Include your database connection configuration here

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // Fetch the hashed password from the user_list table for the given username
    $query = "SELECT * FROM user_list WHERE username = '".$username."' AND password ='".$password."'";
    $result = mysqli_query($conn, $query); // Use the correct database connection variable ($conn in this case)
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

            // Authentication successful
            $_SESSION['admin'] =  $row['id'];
            header('Location: admin_page.php'); // Redirect to the admin dashboard
            exit();
    }
    else
    {
       header('Location: admin_page.php'); // 
    }

    // If authentication fails or user doesn't exist
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form | immudna</title>
    <link rel="stylesheet" href="adminAssets/css/admin-login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  </head>
  <body>
    <div class="container">
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form action="" method="post">
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" name="username" placeholder="Username" required>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password" required>
          </div>
          <div class="row button">
            <input type="submit" name="login" value="Login">
          </div>
          <?php
          if (isset($error_message)) {
              echo '<div class="error">' . $error_message . '</div>';
          }
          ?>
        </form>
      </div>
    </div>
  </body>
</html>
