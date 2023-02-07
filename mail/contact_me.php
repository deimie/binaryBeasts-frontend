<?php
$email_address = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

// Check for empty fields
if(empty($_POST['firstName'])  		||
   empty($_POST['lastName']) 		||
   empty($_POST['email']) 		||
   empty($_POST['password'])	||
   !$email_address)
   {
	echo "No arguments Provided!";
	return false;
   }

$fname = $_POST['firstName'];
$lname = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];

if (empty($_POST['_gotcha'])) { // If hidden field was filled out (by spambots) don't send!
    // Create the email and send the message
    $sql = "INSERT INTO `users` (`firstName`, `lastName`, `email`, `password`) VALUES ('$fname', '$lname', '$email', '$password')";
    return true;
}
echo "Gotcha, spambot!";
return false;
?>
