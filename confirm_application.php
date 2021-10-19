<?php
require_once(dirname(__FILE__) . '/wp-load.php');

$verifyNonce = false;
$success = false;
$error_msg = '';

$first_name = $_POST["first_name"];

if (wp_verify_nonce($_POST['_wpnonce'], 'apply_nonce')) {
    $verifyNonce = true;

    $formVals = array(
        "first_name",
        "last_name",
        "email",
        "phone_num",
        "business_name",
        "loan_amt",
        "use_of_money",
        "marketing_source",
        "biz_street_address",
        "biz_unit_num",
        "biz_city",
        "biz_state",
        "biz_zip_code",
        "entity_type",
        "industry",
        "annual_sales",
        "monthly_loan_pmts",
        "years_in_business",
        "months_in_business",
        "num_employed",
        "home_street_address",
        "home_unit_num",
        "home_city",
        "home_state",
        "home_zip_code",
        "residing_time",
        "us_lived_length",
        "home_own_type",
        "home_rent_pmt",
        "num_financial_deps",
        "monthly_income",
        "dob_month",
        "dob_day",
        "dob_year",
        "ssn"
    );

    $sanatizedVals = sanatize_vals_from_post($formVals);

    /**
     * Post data to Centrex
     **/

    $post_url = getenv("CRM_POST_URL");
    $data_fmt = format_data_for_post($sanatizedVals);

    $ch = curl_init( $post_url );
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $data_fmt);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec( $ch );

    /**
     * Query data to data warehouse
     **/

    $servername = getenv("APP_DB_HOST");
    $username = getenv("APP_DB_USER");
    $password = getenv("APP_DB_PWD");
    $db_name = getenv("APP_DB_NAME");
    $port = getenv("APP_DB_PORT");

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name, $port);

    // Check connection
    if ($conn->connect_error) {
        // Send debug info to log store

        
    } else {
        $sql = "INSERT INTO users (id, " . format_keys_for_query($formVals) . ") VALUES (".$_POST['app_id']."," . format_vals_for_query($sanatizedVals) . ") ON DUPLICATE KEY UPDATE ". format_duplicate_vals($formVals, $sanatizedVals) .";";

        if ($conn->query($sql) === TRUE) {
            $success = true;
        } else {
            $success = false;

            if ($conn->error == "Table 'rsf_db.users' doesn't exist") { }
            $error_msg = $conn->error;
        }

        $conn->close();
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/assets/images/logo-g-t-80x80.png" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/common.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/application.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C700%2C700italic%2C900%2C900italic&#038;ver=5.2.4#038;subset=latin,latin-ext"
        rel="stylesheet">
    <?php wp_head(); ?>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>
    <?php if ($verifyNonce) : ?>
    <div id="app-nav" class="app-nav_wrapper">
        <div class="app-nav_logo_info">
            <div class="logo_wrap">
                <a href="/"><img class="logo" alt="logo"
                        src="<?php echo bloginfo('template_directory'); ?>/assets/images/HorizontalLogo.svg"
                        onerror="this.src='<?php echo bloginfo('template_directory'); ?>/assets/images/HorizontalLogo.png'; this.onerror=null;"></a>
            </div>
            <div class="phone">
                <a class="" href="tel:8888059316"><i class="fa fa-phone"></i> <span class="call-now">Call Us</span><span
                        class="phone-number">(888) 805-9316</span></a>
            </div>
        </div>
        <div class="app-nav">
            <div class="app_nav-item app_confirmed active" id="basic_info">APPLICATION CONFIRMED</div>
        </div>
    </div>
    <div class="success_wrapper">
        <?php if ($success) : ?>
        <img class="success_image" src="<?php bloginfo("template_directory");?>/assets/images/success.svg"
            onerror="this.onerror=null; this.src='<?php bloginfo('template_directory');?>/assets/images/success.png'"
            alt="success">
        <h1 class="conf_head text_center">Thank you, <?php echo $first_name ?>, for your application!</h1>
        <h3 class="conf_subhead text_center">Now just sit tight, we'll review it and get back to you as soon as
            possible!</h3>
        <?php else : ?>
        <h1 class="conf_head text_center">Something went wrong while processing your application :/ <a
                href="tel:8888059316">Call us (888) 805-9316</a></h1>
        <h4 class="conf_subhead">and let us know: <?php echo $error_msg ?></h4>
        <?php endif; ?>
    </div>
    <?php else : ?>
    <h1>403, for security reasons your request has been denied.</h1>
    <?php endif; ?>
</body>

</html>