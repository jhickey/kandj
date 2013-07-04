<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Kate & Jimmy's Wedding!</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
		<script src="js/vendor/jquery.animate-colors-min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/vendor/jbclock.js"></script>
        <?php
            /* Set start and end dates here */
            $startDate  = strtotime("01 January 2013 12:00:00");
            $endDate    = strtotime("24 August 2013 16:00:00");
            /* /Set start and end dates here */
        ?>
        <script>
        $(document).ready(function(){
            JBCountDown({
                secondsColor : "#373634",
                secondsGlow  : "none",

                minutesColor : "#373634",
                minutesGlow  : "none",

                hoursColor   : "#373634",
                hoursGlow    : "none",

                daysColor    : "#373634",
                daysGlow     : "none",

                startDate   : "<?php echo $startDate; ?>",
                endDate     : "<?php echo $endDate; ?>",
                now         : "<?php echo strtotime('now'); ?>"
            });
        });
        </script>
        <script src="js/main.js"></script>
        
        <script type="text/javascript">

</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-39337696-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- This code is taken from http://twitter.github.com/bootstrap/examples/hero.html -->

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="/">Home</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li @if ($data == 'about') class='active' @endif><a href="about">About Us</a></li>
                            <li @if ($data == 'wedding') class='active' @endif><a href="info">Wedding & Reception</a></li>
                            <li @if ($data == 'travel') class='active' @endif><a href="travel">Lodging</a></li>
                            <li @if ($data == 'rsvp') class='active' @endif><a href="rsvp">RSVP</a></li>
                            <li @if ($data == 'registry') class='active' @endif><a href="registry">Registry</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>

        <div class="container main-content">

@include($page)
         
            <footer>
                <p>&copy; Kate & Jimmy, 2013</p>
            </footer>

        </div> <!-- /container -->


    </body>
</html>
