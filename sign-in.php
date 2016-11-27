<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
?>


<?php
session_start();
$error = "";
$link = mysqli_connect("localhost", "root", "", "outfitness");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $sql = "SELECT * FROM users WHERE username='$username' AND email='$email'";
    $result = $link->query($sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        // start the session
        $_SESSION['login_user'] = $username;
        header('Location:member-home.php');
    }
    else {
        $error = "Invalid login credentials";
    }
}
?>

<body class="background-sign-in">
<?php
include('navbar.php');
?>
<header class="background-sign-in">
<div class="header-content">
    <div class="header-content-inner">
        <div class="wrapper">
            <form class="form-signin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <h2 class="form-signin-heading">Please login</h2>
                <input type="text" class="form-control" name="username" placeholder="Username" required=""
                       autofocus=""/>
                <input type="text" class="form-control" name="email" placeholder="email" required=""/>
                <label class="checkbox">
                    <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
                <span class="error"><?php echo $error; ?></span>
            </form>
        </div>
    </div>
</div>
    </header>
</body>
</html>
