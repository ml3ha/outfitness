<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">OUTFITNESS</a>
            <span class="navbar-nav"><?php echo isset($_SESSION['login_user']) ? $_SESSION['login_user'] : '';?></span>
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
                <li>
                    <a class="page-scroll" href="sign-in.php">Sign In</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
