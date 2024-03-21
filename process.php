<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $message = $_POST["message"];

  // Replace 'your_email@example.com' with your actual email address
  $to = "your_email@example.com"; // Your email address
  $subject = "New Form Submission: $subject";
  $headers = "From: $email";

  // Compose the email message
  $email_message = "First Name: $firstName\n"
                  . "Last Name: $lastName\n"
                  . "Email: $email\n"
                  . "Subject: $subject\n\n"
                  . "Message:\n$message";

  // Send the email
  $success = mail($to, $subject, $email_message, $headers);

  if ($success) {
    echo "Thank you for your submission!";
  } else {
    echo "Error sending the email. Please try again later.";
  }
} else {
  header("HTTP/1.1 405 Method Not Allowed");
  echo "Method Not Allowed";
}
?>
