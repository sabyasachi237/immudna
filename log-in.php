<?php
include('config.php'); // Include 'config.php' to establish the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $input_username = $_POST["username"];
    $input_password = $_POST["password"];

    // Prepare and execute the SQL query to fetch user data by username or email
    $sql = "SELECT id, username, password FROM users WHERE username = ? OR email_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $input_username, $input_username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $db_username, $db_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($input_password, $db_password)) {
            // Password is correct; user is logged in
            session_start();
            $_SESSION['user_id'] = $user_id;
            // Redirect to the user's dashboard or another page
            header("Location: profile.php");
            exit();
        } else {
            $login_error = "Incorrect username or password.";
        }
    } else {
        $login_error = "Incorrect username or password.";
    }

    // Close the prepared statement
    $stmt->close();
}

include('header.php');
?>

<!-- START PAGE TITLE AREA -->
<div class="page-title-area bg-8">
    <div class="container">
        <div class="page-title-content">
            <h2>Log In</h2>
            <ul>
                <li>
                    <a href="index.php">
                        Home 
                    </a>
                </li>

                <li>Pages</li>
                <li class="active">Log In</li>
            </ul>
        </div>
    </div>
</div>
<!-- END PAGE TITLE AREA -->

<!-- START LOG IN AREA -->
<section data-aos="fade-up" data-aos-duration="1200" class="user-area-style log-in-area ptb-100">
    <div class="container">
        <div class="contact-form-action">
            <div class="section-title">
                <h2>Log In to your account!</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium quas cumque iste veniam id dolorem deserunt ratione</p>
            </div>
            <form method="post">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="username" placeholder="Username or Email">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="default-btn btn-two" type="submit">
                            Log In Now
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- END LOG IN AREA -->

<!-- START SUBSCRIBE AREA -->
<section class="subscribe-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2>Subscribe Now</h2>
                <p>Get our latest news & update regularly</p>
            </div>

            <div class="col-lg-6">
                <form class="newsletter-form" data-toggle="validator">
                    <input type="email" class="form-control" placeholder="Enter Your Email" name="EMAIL" required autocomplete="off">

                    <button class="default-btn" type="submit">
                        Subscribe
                    </button>

                    <div id="validator-newsletter" class="form-result"></div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- END SUBSCRIBE AREA  -->


<?php
// Display login error message, if any
if (isset($login_error)) {
    echo '<div class="error-message">' . $login_error . '</div>';
}

include('footer.php');
?>