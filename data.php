<?php include ($_SERVER['DOCUMENT_ROOT']."/resources/func.php");?>
<!-- Countdown -->
<div class="countdown" id="countdown">
    <div class="container">
        <div class="row">
            <div class="form-and-links-container col-sm-8 col-sm-offset-2">
                <div class="countdown-label">
                    <p class="text-center"><strong>We Buy</strong> : RM<?php getPrice('1', 'we_buy');?>/g <i class=<?php getStats('1', 'we_buy'); ?>></i></p>
                    <p class="text-center"><strong>We Sell</strong> : RM<?php getPrice('1', 'we_sell');?>/g <i class=<?php getStats('1', 'we_sell'); ?>></i></p>
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
