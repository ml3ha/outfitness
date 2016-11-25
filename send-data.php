<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "outfitness");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['firstName'])) {
    $nameErr = "Name is required";
  } else {
    $first_name = mysqli_real_escape_string($link, $_POST['firstName']);
  }
}
$last_name = mysqli_real_escape_string($link, $_POST['lastName']);
$email_address = mysqli_real_escape_string($link, $_POST['email']);
$username = mysqli_real_escape_string($link, $_POST['username']);
$address = mysqli_real_escape_string($link, $_POST['address']);
$city = mysqli_real_escape_string($link, $_POST['city']);
$zip = mysqli_real_escape_string($link, $_POST['zip']);
$state = mysqli_real_escape_string($link, $_POST['state']);

// Attempt insert query execution
$sql = "INSERT INTO users (first_name, last_name, email, username, address, city, zip, state) VALUES ('$first_name', '$last_name', '$email_address', '$username', '$address', '$city', '$zip', '$state')";
if(mysqli_query($link, $sql)){
    header("Location: sign-up.php");

} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
// Close connection
mysqli_close($link);
?>