<?php 

/**
* Requires the "PHP Email Form" library
* The "PHP Email Form" library is available only in the pro version of the template
* The library should be uploaded to: vendor/php-email-form/php-email-form.php
* For more info and help: https://bootstrapmade.com/php-email-form/
*/

// Replace contact@example.com with your real receiving email address
$to_email = 'info@basicbillingsolutions.com';
$name = $_POST['name'];
$from_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

function sanitize_my_email($field) {
  $field = filter_var($field, FILTER_SANITIZE_EMAIL);
  if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
      return true;
  } else {
      return false;
  }
}

$headers = "From: $from_email";
//check if the email address is invalid $secure_check
$secure_check = sanitize_my_email($to_email);
if ($secure_check == false) {
  echo "Invalid input";
} else { //send email 
  mail($to_email, $subject, $message, $headers);
  echo "Mail successfully sent.";
}

?>