<?php
    //Device Detection
    require_once 'Mobile_Detect.php';
    $objMobile = new Mobile_Detect;
    $device = 'Desktop';
    if ($objMobile->isMobile()) {
        $device = 'Mobile';
    }
    if ($objMobile->isTablet()) {
        $device = 'Tablet';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/logo-g-t-80x80.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/common.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/application.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic&#038;ver=5.2.4#038;subset=latin,latin-ext" rel="stylesheet">
    <?php wp_head(); ?>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <div id="app-nav" class="app-nav_wrapper">
        <div class="app-nav_logo_info">
            <div class="logo_wrap">
                <img class="logo" alt="logo" src="<?php echo bloginfo('template_directory'); ?>/assets/images/HorizontalLogo.svg" onerror="this.src='<?php echo bloginfo('template_directory'); ?>/assets/images/HorizontalLogo.png'; this.onerror=null;">
            </div>
            <div class="phone">
                <a class="" href="tel:8888059316"><i class="fa fa-phone"></i> <span class="call-now">Call Us</span><span class="phone-number">(888) 805-9316</span></a>
            </div>
        </div>
        <div class="app-nav">
            <div class="app_nav-item active" id="basic_info" role="button" onClick="changeToTab(1)">1. Basic Info</div>
            <div class="app_nav-item" id="business_info" role="button" onClick="changeToTab(2)">2. Business Info</div>
            <div class="app_nav-item" id="owner_info" role="button" onClick="changeToTab(3)">3. Owner Info</div>
        </div>
    </div>