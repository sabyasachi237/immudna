<?php
include '../../../config.php'; // Include your database connection configuration here

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
            header('Location: index.php'); // Redirect to the admin dashboard
            exit();
    }
    else
    {
       header('Location: signup.php'); // 
    }

}
?>


<?include_once 'header.php'; ?>
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
