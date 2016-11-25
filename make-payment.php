<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<?php
include('header.php');
include('Checkout-REST-php-master/apiCallsData.php');
?>


<body class="background-sign-up">

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
            <h1 class="text-center">Choose an Outfit</h1>
            <hr>
            <div class="form-group p-t-2">
                <select id="outfit" class="form-control" name="outfit"
                        value="<?php echo isset($_POST['outfit']) ? $_POST['outfit'] : '' ?>" required>
                    <option value="1" id="outfit1">Outfit 1</option>
                    <option value="2" id="outfit2">Outfit 2</option>
                    <option value="3" id="outfit3">Outfit 3</option>
                </select>
            </div>
            <div id="outfitImage">
                <img id="outfitImg" class="img-size" src="img/outfit1.jpg">
            </div>
            <h3>Payment Details</h3>
            <form id="myContainer" action="Checkout-REST-php-master/startPayment.php" method="POST">
                <input type="hidden" name="csrf" value="<?php echo($_SESSION['csrf']); ?>"/>
                <h5>A payment of $300 will be charged to your credit card</h5>
                <div style="display:none;">
                    <div class="form-group">
                        <input type="text" id="cost" class="form-control" name="camera_amount"
                               value="300" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" id="tax" class="form-control" name="tax"
                               value="0" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" id="insurance" class="form-control" name="insurance"
                               value="0" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" id="handling" class="form-control" name="handling_fee"
                               value="0" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" id="shipping" class="form-control" name="estimated_shipping"
                               value="0" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" id="discount" class="form-control" name="shipping_discount"
                               value="0" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" id="total" class="form-control" name="total_amount"
                               value="300" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" id="currency" class="form-control" name="currencyCodeType"
                               value="USD" readonly>
                    </div>
                </div>
                <input id="paypalSubmit" type="submit" value="Make payment" class="btn btn-lg"></input>
            </form>
        </div>
    </div>
</header>
<script type="text/javascript">
    window.paypalCheckoutReady = function () {
        paypal.checkout.setup('IDHM2ATNNA6FWJW', {
            container: 'paypalSubmit', //{String|HTMLElement|Array} where you want the PayPal button to reside
            environment: 'sandbox' //or 'production' depending on your environment
        });
    };
</script>
<script src="//www.paypalobjects.com/api/checkout.js" async></script>
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
</body>
</html>