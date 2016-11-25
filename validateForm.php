<?php
require '../../../PHPMailer/PHPMailerAutoload.php';
include_once('../../../PHPMailer/class.phpmailer.php');

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "maxwellluo97@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "ilikepie345";


$success = "";
$link = mysqli_connect("localhost", "root", "", "outfitness");
$checkValid = True;
$usernameErr = $emailErr = $nameErr = $addressErr = $cityErr = $zipErr = $cardErr = $expirErr = $cvvErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $submitted = True;
    if (empty($_POST['name'])) {
        $nameErr = "Name is required";
        $checkValid = False;
    } else {
        $name = mysqli_real_escape_string($link, $_POST['name']);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
            $checkValid = False;
        }

    }

    if (empty($_POST['username'])) {
        $usernameErr = "Username is required";
        $checkValid = False;
    } else {
        $username = mysqli_real_escape_string($link, $_POST['username']);
        if (!preg_match("/^[a-zA-Z0-9 ]*$/", $username)) {
            $usernameErr = "Only letters, numbers, and spaces allowed.";
            $checkValid = False;
        }
    }

    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
        $checkValid = False;
    } else {
        $email = mysqli_real_escape_string($link, $_POST['email']);
        if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
            $emailErr = "Please use a valid email";
            $checkValid = False;
        }
    }

    if (empty($_POST['address'])) {
        $addressErr = "Address is required";
        $checkValid = False;
    } else {
        $address = mysqli_real_escape_string($link, $_POST['address']);
        if (!preg_match("/^\d+\s[A-z]+\s[A-z]+/", $address)) {
            $addressErr = "Please use a valid address";
            $checkValid = False;
        }
    }

    if (empty($_POST['city'])) {
        $cityErr = "City is required";
        $checkValid = False;
    } else {
        $city = mysqli_real_escape_string($link, $_POST['city']);
        if (!preg_match("/^[a-zA-Z]+([-.]?[a-zA-Z ]+|)$/", $city)) {
            $cityErr = "Please use a valid city";
            $checkValid = False;
        }
    }

    if (empty($_POST['zip'])) {
        $zipErr = "Zip code is required";
        $checkValid = False;
    } else {
        $zip = mysqli_real_escape_string($link, $_POST['zip']);
        if (!preg_match("/^\d{5}(?:[-\s]\d{4})?$/", $zip)) {
            $zipErr = "Please use a valid zip code";
            $checkValid = False;
        }
    }
    $state = mysqli_real_escape_string($link, $_POST['state']);


    if (empty($_POST['cardnumber'])) {
        $cardErr = "Credit card number is required";
        $checkValid = False;
    } else {
        $cardnumber = mysqli_real_escape_string($link, $_POST['cardnumber']);
        if (!preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/", $cardnumber)) {
            $expirErr = "Please use a valid credit card number.";
            $checkValid = False;
        }
    }

    if (empty($_POST['expiration'])) {
        $expirErr = "Expiration date is required";
        $checkValid = False;
    } else {
        $expiration = mysqli_real_escape_string($link, $_POST['expiration']);
        if (!preg_match("/^(0[1-9]|1[0-2])\/[0-9]{2}$/", $expiration)) {
            $expirErr = "Please use a valid expiration date";
            $checkValid = False;
        }
    }

    if (empty($_POST['cvv'])) {
        $cvvErr = "CVV is required";
        $checkValid = False;
    } else {
        $cvv = mysqli_real_escape_string($link, $_POST['cvv']);
        if (!preg_match("/^[0-9]{3,4}$/", $cvv)) {
            $cvvErr = "Please use a valid CVV";
            $checkValid = False;
        }
    }

    $checkValid2 = False;
    $checkValid3 = False;
    if ($checkValid == True) {

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            $checkValid2 = False;
            $usernameErr = "Username is taken.";
        } else {
            $checkValid2 = True;
        }

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            $checkValid3 = False;
            $emailErr = "Email is taken.";
        } else {

            $checkValid3 = True;
        }


    }


    if ($checkValid2 && $checkValid3) {
        $sql = "INSERT INTO users (name, email, username, address, city, zip, state, credit_card, expiration, cvv) VALUES ('$name', '$email', '$username', '$address', '$city', '$zip', '$state', '$cardnumber', '$expiration', '$cvv')";
        if (mysqli_query($link, $sql)) {
            header("Location: make-payment.php");
            $success = "Account successfully created! Welcome to Outfitness!";
            //Set who the message is to be sent from
            $mail->setFrom('maxwellluo97@gmail.com', '');

//Set an alternative reply-to address
            $mail->addReplyTo('maxwellluo97@gmail.com', 'First Last');

//Set who the message is to be sent to
            $mail->addAddress($email, $name);

//Set the subject line
            $mail->Subject = 'Thanks for the purchase, ' . $name . "!";

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
            $mail->Body = "Thanks for making your first purchase with OutFitness. Your username is " . $username . " and your email is " . $email;

//Replace the plain text body with one created manually
            $mail->AltBody = 'This is a plain-text message body';

//Attach an image file

//send the message, check for errors
            if (!$mail->send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent!";
            }
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }
}
?>