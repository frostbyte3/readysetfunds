<?php
defined('ABSPATH') || exit;

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

$hero_bg_src = get_home_header_image();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/logo-g-t-80x80.png">

    <link rel="stylesheet" href="https://ajax.aspnetcdn.com/ajax/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/ext-res-backups/bootstrap.min.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic&#038;ver=5.2.4#038;subset=latin,latin-ext" rel="stylesheet">

    <script src="<?php echo bloginfo('template_directory') ?>/assets/ext-res-backups/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo bloginfo('template_directory') ?>/assets/ext-res-backups/popper.min.js"></script>
    <script src="<?php echo bloginfo('template_directory') ?>/assets/ext-res-backups/bootstrap.min.js"></script>
    <?php wp_head(); ?>
    <?php do_action('wp_head'); ?>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <?php do_action('wp_body_open'); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'readysetfunds'); ?></a>
        <?php do_action('main_nav') ?>

        <header class="banner-wrap">
            <div class="banner" <?php if(isset($hero_bg_src) && $hero_bg_src != '') { echo "style=\"background-image: url('$hero_bg_src')\""; } ?>>
                <div class="right banner-wrap-wrap">
                    <div class="banner-text-wrap">
                        <div class="banner-text">
                            <form action="/apply#loan_amt" method="get">
                                <label class="home-form" for="loan_amount_required">How Much Money Do You Need?</label>
                                <input type="tel" class="how_much_input currency" name="loan_amount_required" value="$" pattern="^\$?[\d,$]+(\.\d*)?$" id="loan_amount_required" required />
                                <div class="action_buttons">
                                    <input type="submit" class="green_button" id="see_if_qualify" value="Get Me A Loan">
                                    <div class="hr"><span>or</span></div>
                                    <input type="button" onclick="go_to_calc()" class="green_button" id="get_payback_est" value="Get Payback Estimate*">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--<div class="info_strip">
                    <div class="hero_name_wrapper">
                        <div class="hero_name_text_wrapper">
                            <div class="hero_name_text_inner">
                                <h1>Ready Set Funds</h1>
                                <h4>The Fastest Way To Grow Your Business</h4>
                            </div>
                        </div>
                    </div>
                    <div class="taglines">
                    </div>
                </div>-->
            </div>
        </header>
        <div id="content" class="site-content">