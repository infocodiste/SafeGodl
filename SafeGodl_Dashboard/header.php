<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SafeGodl</title>
 
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">

    <link rel="stylesheet" href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" />
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>

    <div class="showLoader" style="display: none;">Please Wait...</div>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="javascript:void()" class="brand-logo text-center justify-content-center">
            	<!-- <img src="images/logo.png" width="50" /> -->
            	<!-- &nbsp; &nbsp; -->
            	<span class="logoHeading">SafeGodl</span>
            	<!-- <img src="images/logo-1.png" style="max-width: 100%" /> -->
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                        </div>
                        <ul class="navbar-nav header-right main-notification">
                            <li class="nav-item ">
                                <a class="nav-link btn btn-secondary btn-sm text-white" href="javascript:void(0)" id="connectServer">
                                    &nbsp; <span>Connect Wallet</span> &nbsp;
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->
