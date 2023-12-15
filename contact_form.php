<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $service = $_POST['Service'];
    $date = $_POST['Date'];
    $time = $_POST['Time'];
    $message = $_POST['message'];

    $to = "ssen5271@gmail.com"; // Replace this with your email address
    $subject = "New Contact Form Submission";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nService: $service\nDate: $date\nTime: $time\nMessage:\n$message";

    $headers = "From: $email";

    // Check if all fields are filled
    if (!empty($name) && !empty($email) && !empty($phone) && !empty($service) && !empty($date) && !empty($time) && !empty($message)) {
        // Attempt to send the email
        if (mail($to, $subject, $body, $headers)) {
            echo '<p>Your message has been sent successfully!</p>';
        } else {
            echo '<p>There was a problem sending your message. Please try again later.</p>';
        }
    } else {
        echo '<p>All fields are required.</p>';
    }
} else {
    echo '<p>Something went wrong. Please try again.</p>';
}
?>
