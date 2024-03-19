<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Define variables and initialize with empty values
    $first_name = $last_name = $email = $phone = $message = "";

    // Function to sanitize input and prevent SQL injection
    function sanitize_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Sanitize form inputs
    $first_name = sanitize_input($_POST["first_name"]);
    $last_name = sanitize_input($_POST["last_name"]);
    $email = sanitize_input($_POST["email"]);
    $phone = sanitize_input($_POST["phone"]);
    $message = sanitize_input($_POST["message"]);

    // Combine form data
    $form_data = "First Name: $first_name\nLast Name: $last_name\nEmail: $email\nPhone: $phone\nMessage: $message\n";

    // File to store form submissions
    $file = "form_submissions.txt";

    // Open the file in append mode
    $fp = fopen($file, "a");

    // Write the form data to the file
    fwrite($fp, $form_data);

    // Close the file
    fclose($fp);

    // Redirect back to the contact page or a thank you page
    header("Location: contact_us.html");
    exit();
}
?>
