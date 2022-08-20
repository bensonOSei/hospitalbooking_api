<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta  name="theme-color" content = "#fff">
    <script src="https://kit.fontawesome.com/6db44154cb.js" crossorigin="anonymous"></script>

    <?php 
        $url =$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        if(str_contains($url,'index.php') || $_SERVER['REQUEST_URI']=='/') :
    
    ?>

    <link rel="stylesheet" href="web/styles/style.css" >
    <script defer type="module" src="web/js/displays.js"></script>
    <script defer type="module" src="web/js/components.js"></script>
    <script defer type="module" src="web/js/formFunctions.js"></script>
    <script defer type="module" src="web/js/trackAppointmentForm.js"></script>
    <script defer type="module" src="web/js/realtimechecker.js"></script>

    <?php 
        else :
    ?>
    <link rel="stylesheet" href="styles/style.css">
    <script defer type="module" src="js/displays.js"></script>
    <script defer type="module" src="js/components.js"></script>
    <script defer type="module" src="js/formFunctions.js"></script>
    <script defer type="module" src="js/realtimechecker.js"></script>

        <?php if(str_contains($url,'/viewbooking.php') ||str_contains($url,'makebooking.php') ) :?>
            <!-- <script defer type="module" src="js/trackAppointmentForm.js"></script> -->
            <!-- <script defer type="module" src="js/viewDetails.js"></script> -->
        <?php else : ?>
            <script defer type="module" src="js/trackAppointmentForm.js"></script>
        <?php endif; ?>

    <?php
        endif;
        if(str_contains($url,'makebooking.php')) :
     ?>
        <!-- <script defer type="module" src="js/trackAppointmentForm.js"></script> -->
        <script defer type="module" src="js/bookAppointmentForm.js"></script>

    <?php endif; ?>

    <noscript>
        Your browser does not support JavaScript or JavaScript has been disabled
    </noscript>
    <title>St.Benson Homeopathic</title>
</head>
<body>
    <!-- TODO: Add 'aria-label' to elements; improve accessibilty for reference: https://www.aditus.io  -->
    <div class="status-bar">
        <p id="status" class=" m-none"> Online</p>
    </div>

    <header class="topnav flex-row align-center justify-content-space-between px-large">
        <div class="nav-logo" >
            <h1>Logo</h1>

            <!-- TODO: Add logo 'svg/png' (svg prefered)  -->
        </div>

        <nav class="nav-list">
            <!-- TODO: Associaate hyperlinks with appropriate pages -->
            <a href="../includes/route.inc.php/home">Home</a>
            <a href="../includes/route.inc.php/booking">Bookings</a>
            <a href="#">Support</a>
            <a href="#">Blog</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
        <div class="hamburger" role="button" aria-label="open navigation">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>

    </header>
