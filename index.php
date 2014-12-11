<?php include ($_SERVER['DOCUMENT_ROOT']."/resources/func.php");?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MKS Indicative Gold Prices</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- Custom fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,100" rel="stylesheet">

        <!-- Bootstrap stylesheets -->
        <link href="./themes/css/bootstrap.css" rel="stylesheet">

        <!-- Template stylesheets -->
        <link href="./themes/css/shader.css" rel="stylesheet">
    </head>

    <body class="theme-fire">
        <!-- Background container -->
        <!-- <div id="background-container" class="background-container">
            <div id="background-output" class="background-output"></div>
            <div id="vignette" class="background-vignette"></div>
            <div id="noise" class="background-noise"></div>
        </div> -->
        <!-- /Background container -->

        <!-- Main content -->
        <div class="content">
            <div class="container">
                <!-- Header -->
                <div class="row">
                    <h1 class="header col-sm-8 col-sm-offset-2">MKS</h1>
                </div>
                <!-- /Header -->

            </div>
            <div id="data">
                <!-- Countdown -->
                <div class="countdown" id="countdown">
                    <div class="container">
                        <div class="row">
                            <div class="form-and-links-container col-sm-8 col-sm-offset-2">
                                <div class="countdown-label">
                                    <div id="price">
                                        <p class="text-center"><strong>We Buy</strong> : RM<?php getPrice('1', 'we_buy');?>/g <i class=<?php getStats('1', 'we_buy'); ?>></i></p>
                                        <p class="text-center"><strong>We Sell</strong> : RM<?php getPrice('1', 'we_sell');?>/g <i class=<?php getStats('1', 'we_sell'); ?>></i></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Countdown -->
                <div class="container">
                    <!-- Description -->
                    <div class="row">
                        <p class="description col-sm-8 col-sm-offset-2">— Last update : <?php getTime();?></p>
                    </div>
                    <!-- /Description -->
                </div>
            </div>
        </div>
        <!-- /Main content -->
        <!-- Scripts -->
        <script src="./themes/js/jquery-1.11.1.min.js"></script>
        <script>
            $(document).ready(function() {
                setInterval(function() {
                    $('#data').load( "data.php" );
                }, 60000);
            });
        </script>
    </body>
</html>