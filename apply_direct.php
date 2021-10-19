<?php
require_once(dirname(__FILE__) . '/wp-load.php');

header("Access-Control-Allow-Origin: ".get_site_url());
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$success = false;
$error_msg = '';

$_POST = getPostFromAjax();

if (wp_verify_nonce($_POST['_wpnonce'], 'apply_nonce')) {

    $formValsP1 = array(
        "first_name",
        "last_name",
        "email",
        "phone_num",
        "business_name",
        "loan_amt",
        "use_of_money",
        "marketing_source");

    $formValsP2 = array(
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
        "num_employed");
    
    $formValsP3 = array(
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

    $tab = $_POST['tab'];

    $formVals = array_merge_recursive($formValsP1, $formValsP2, $formValsP3);

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
        echo '{"status":"500","success":"false","err_msg":"'.$conn->error.'"}';
    } else {
        $sql = "INSERT INTO users (id, " . format_keys_for_query($formVals) . ") VALUES (".$_POST['app_id']."," . format_vals_for_query($sanatizedVals) . ") ON DUPLICATE KEY UPDATE ". format_duplicate_vals($formVals, $sanatizedVals) .";";

        if ($conn->query($sql) === TRUE) {
            echo '{"status":"200","success":"true"}';
            $success = true;
        } else {
            $success = false;

            if ($conn->error == "Table 'rsf_db.users' doesn't exist") { }

            echo '{"status":"500","success":"false","err_msg":"'.$conn->error.'"}';
        }

        $conn->close();
    }
} else {
    echo '{"status":"401", success":"false","err_msg":"No Hax Pls <3"}';
}
