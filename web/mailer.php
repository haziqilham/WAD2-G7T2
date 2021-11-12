<?php

$from = 'Study Site';
$to = $_POST["email"];
console.log($to);

// $body = $_POST['message'];

$subject = $_POST["subject"];
$message = "<html><body>From E-Mail: Your Message has been received! </body></html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <StudySite@gmail.com>' . "\r\n";

mail($to,$subject,$message,$headers);

header('Location: index.html');
exit();

