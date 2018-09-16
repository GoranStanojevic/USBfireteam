<?php
$errors = '';
if(empty($_POST['name'])  ||
   empty($_POST['email']) ||
   empty($_POST['subject']) ||
   empty($_POST['message']))
{
    $errors .= "\n All fields are mandatory";
}
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$email_subject = $_POST['subject'];
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Your email address";
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Subject: $name";
$email_body = "Dobili ste novu poruku od:\n".
"Ime: $name \n ".
"Email: $email_address\n Poruka: \n $message";
$headers = "From: $myemail\n";
$headers .= "Resend: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: Contact.html');
}
?>