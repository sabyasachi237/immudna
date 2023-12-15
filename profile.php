<?php
include('config.php');
include('header.php');

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, so retrieve user information from the database
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT first_name, last_name, email_id FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->bind_result($first_name, $last_name, $email_id);
    $stmt->fetch();
    $stmt->close();

    // Calculate the full name by concatenating first_name and last_name
    $full_name = $first_name . ' ' . $last_name;
} else {
    // If the user is not logged in, you can redirect them to the login page
    header("Location: login.php");
    exit();
}
?>

<!-- Your HTML content with embedded CSS -->
<div class="container d-flex justify-content-center mt-5">
    <div class="card" style="border: 1px solid #ccc; border-radius: 10px; max-width: 400px; padding: 20px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <div class="top-container">
            <img src="immudna/immudna/img/default-avatar.png" class="img-fluid profile-image" width="70">
            <div class="ml-3">
                <h5 class="name"><?php echo $full_name; ?></h5>
                <p class="mail"><?php echo $email_id; ?></p>
                <a href="logout.php" class="logout-button" >Logout</a>
            </div>
        </div>
        <div class="middle-container d-flex justify-content-between align-items-center mt-3 p-2" style="background-color: #f7f7f7; border-radius: 10px; padding: 10px;">
            <div class="dollar-div px-3">
                <div class="round-div"><i class="fa fa-dollar dollar" style="font-size: 32px; color: #2ecc71;"></i></div>
            </div>
        </div>
    </div>
</div>


<?php
include('footer.php');
?>
