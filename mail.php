<?php
if(isset( $_POST['name']))
$name = $_POST['name'];
if(isset( $_POST['email']))
$email = $_POST['email'];
if(isset( $_POST['message']))
$message = $_POST['message'];
if(isset( $_POST['phone']))
$phone = $_POST['phone'];

$subject = "Contato site";

if ($name === ''){
    echo "Name cannot be empty.";
    die();
}
if ($email === ''){
    echo "Email cannot be empty.";
    die();
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email format invalid.";
        die();
    }
}
if ($message === ''){
    echo "Message cannot be empty.";
    die();
}

$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "???????@gmail.com"; // email da empresa
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");

header("location: index.php?i=contact");
?>