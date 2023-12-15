<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('config.php');

    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $username = $_POST["username"];
    $email = $_POST["email_id"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($email)) {
        echo "Email address is required. Please fill in your email.";
    } elseif ($password !== $confirm_password) {
        echo "Password and Confirm Password do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (first_name, last_name, username, email_id, password, confirm_password) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $first_name, $last_name, $username, $email, $hashed_password, $confirm_password);

        if ($stmt->execute()) {
            header("Location: log-in.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

include('header.php');
?>

<div class="page-title-area bg-9">
    <div class="container">
        <div class="page-title-content">
            <h2>Sign Up</h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>Pages</li>
                <li class="active">Sign Up</li>
            </ul>
        </div>
    </div>
</div>

<section class="user-area-style log-in-area ptb-100">
    <div class="container">
        <div class="contact-form-action">
            <div data-aos="fade-up" data-aos-duration="1200" class="section-title">
                <h2>Create An Account!</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium quas cumque iste veniam id dolorem deserunt ratione.</p>
            </div>
            <form data-aos="fade-up" data-aos-duration="1600" method="post">
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="first_name" placeholder="First Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="last_name" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <input class="form-control" type="text" name="username" placeholder="Enter your Username">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <input class="form-control" type="email" name="email_id" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <div class="form-group">
                            <input class="form-control" type="password" name="confirm_password" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="default-btn btn-two" type="submit">Register Account</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

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
                    <button class="default-btn" type="submit">Subscribe</button>
                    <div id="validator-newsletter" class="form-result"></div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include('footer.php');
?>
