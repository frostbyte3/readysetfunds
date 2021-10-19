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
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/common.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/default_v1.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic&#038;ver=5.2.4#038;subset=latin,latin-ext" rel="stylesheet">

    <?php wp_head(); ?>
    <?php do_action('wp_head'); ?>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <?php do_action('wp_body_open'); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'readysetfunds'); ?></a>
        <?php do_action('main_nav') ?>
        <div id="content" class="site-content">