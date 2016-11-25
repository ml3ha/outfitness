<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
?>


<body class="background-sign-up">
<?php
include('validateForm.php');
include('Checkout-REST-php-master/apiCallsData.php');
?>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">OUTFITNESS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a class="page-scroll" href="index.html">Home</a>
                </li>
                <li>
                    <a class="page-scroll" href="index.html#about">About</a>
                </li>
                <li>
                    <a class="page-scroll" href="sign-up.php">Sign Up</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<header class="background-sign-up">
    <div class="header-content">
        <div class="header-content-inner">
            <h1 class="text-center">Get started immediately.</h1>
            <hr>
            <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                <form name="form" id="sign-up-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                      method="post">
                    <h3 class="text-left">Personal Information</h3>
                    <div class="form-group">
                        <input type="text" id="username" class="form-control" name="username" placeholder="Username"
                               value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>" required>
                        <span id="1" class="error pull-left"><?php echo $usernameErr; ?></span>
                    </div>
                    <div class="form-group p-t-2">
                        <input type="text" id="email" class="form-control" name="email" placeholder="Email"
                               value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                        <span id="2" class="error pull-left"><?php echo $emailErr; ?></span>
                    </div>
                    <div class="form-group p-t-2">
                        <input type="text" id="name" class="form-control" name="name" placeholder="Full Name"
                               value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>" required>
                        <span id="3" class="error pull-left"><?php echo $nameErr; ?></span>
                    </div>

                    <div class="form-group p-t-2">
                        <input type="text" id="address" class="form-control" name="address" placeholder="Address"
                               value="<?php echo isset($_POST['address']) ? $_POST['address'] : '' ?>" required>
                        <span id="4" class="error pull-left"><?php echo $addressErr; ?></span>
                    </div>
                    <div class="row p-t-2">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="text" id="city" class="form-control" name="city" placeholder="City"
                                       value="<?php echo isset($_POST['city']) ? $_POST['city'] : '' ?>" required>
                                <span id="5" class="error pull-left"><?php echo $cityErr; ?></span>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <select class="form-control" name="state" name="state"
                                    value="<?php echo isset($_POST['state']) ? $_POST['state'] : '' ?>">
                                <?php
                                include('states.php');
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <input type="text" id="zip" id="zipCodeForm" class="form-control" name="zip"
                                       placeholder="Zip code"
                                       value="<?php echo isset($_POST['zip']) ? $_POST['zip'] : '' ?>" required>
                                <span id="6" class="error pull-left"><?php echo $zipErr; ?></span>
                            </div>
                        </div>
                    </div>
                    <h3 class="text-left">Banking Information</h3>
                    <div class="form-group">
                        <input type="text" id="cardnumber" class="form-control" name="cardnumber"
                               placeholder="Credit Card Number"
                               value="<?php echo isset($_POST['cardnumber']) ? $_POST['cardnumber'] : '' ?>" required>
                        <span id="cardErr" class="error pull-left"><?php echo $cardErr; ?></span>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <input type="text" id="expiration" class="form-control" name="expiration"
                                   placeholder="Expiration Date (MM/YY)"
                                   value="<?php echo isset($_POST['expiration']) ? $_POST['expiration'] : '' ?>"
                                   required>
                            <span id="expirationErr" class="error pull-left"><?php echo $cardErr; ?></span>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" id="cvv" class="form-control" name="cvv"
                                   placeholder="CVV"
                                   value="<?php echo isset($_POST['cvv']) ? $_POST['cvv'] : '' ?>"
                                   required>
                            <span id="cvvErr" class="error pull-left"><?php echo $cardErr; ?></span>
                        </div>
                    </div>
                    <hr>
                    <div id="check" class="btn btn-lg btn-default">Sign Up</div>
                    <button style="display: none;" type="submit" id="submit"></button>
                    <span id="7" class="success"><?php echo $success; ?></span>
            </div>
            </form>
        </div>
    </div>


</header>
<script>
    $(document).ready(function () {
        $('#outfit').change(function () {
            var myimages = {
                '1': 'img/outfit1.jpg',
                '2': 'img/outfit2.jpg',
                '3': 'img/outfit3.jpg'
            };
            var selectedImage = myimages[$(this).val()];
            $('#outfitImg').attr("src", selectedImage);
        })
    })
</script>
<?php
include('frontEndValidations.php');
?>
</body>
</html>