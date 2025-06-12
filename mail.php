<?php
 require(__DIR__ . '/../inc/PHPMailer/src/Exception.php');
 require(__DIR__ . '/../inc/PHPMailer/src/PHPMailer.php');
require(__DIR__ . '/../inc/PHPMailer/src/SMTP.php');
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 date_default_timezone_set("Asia/Kolkata");
 function send_mail($uemail, $subject, $body) {
  $mail = new PHPMailer(true);
  try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'mail.domain.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'support@domain.com';
    $mail->Password = 'Workingjdbfjs%hcfbjPassq4';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    // Recipients
    $mail->setFrom('support@domain.com', 'InternWebsite');
    $mail->addAddress($uemail); // Recipient's email
    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->send();
    return 1;
  } catch (Exception $e) {
    // Log the error if needed: $e->getMessage()
    return 0;
  }
 }
 // Handle form submission
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $subject = "New Subscription from WordWise";
  $body = "Name: $name\nEmail: $email\nMessage: $message";
  if (send_mail("admin@wordwise.com", $subject, $body)) {
    echo "Thank you for subscribing! We will notify you soon.";
  } else {
    echo "There was an error. Please try again later.";
  }
}
 ?>