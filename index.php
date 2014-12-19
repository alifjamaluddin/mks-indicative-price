<?php include ($_SERVER['DOCUMENT_ROOT']."/resources/func.php");?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>MKS Indicative Gold Prices</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <!-- Custom fonts -->
        <link href="./themes/css/Roboto.css" rel="stylesheet">

        <!-- Bootstrap stylesheets -->
        <link href="./themes/css/bootstrap.css" rel="stylesheet">

        <!-- Template stylesheets -->
        <link href="./themes/css/shader.css" rel="stylesheet">
    </head>

    <body class="theme-fire">

        <h1 class="header">MKS</h1>
    
        <!-- Main content -->
        <div class="content">
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
    <!-- Footer content -->
<div class="footer">
  <div class="container">
  	<div class="row">
  		<div class="col-md-4">
  			<p class="text-muted small"><?php echo $git->output('short'); ?></p>
  		</div>
  		<div class="col-md-8">
  			<p class="text-muted small text-right">&copy 2014. coded by <a href="https://www.bricklabs.my">BRICKLabs</a></p>
  		</div>
  	</div>
  </div>
</div>
   	<!-- /Footer content -->
        <!-- Scripts -->
        <script src="./themes/js/jquery-1.11.1.min.js"></script>
        <script src="./themes/js/mks.js"></script>
    </body>
</html>