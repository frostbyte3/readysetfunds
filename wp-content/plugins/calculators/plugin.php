<?php
/*
Plugin Name: RSF Calculators
Description: RSF Calculation Display & Logic
Version:     20191121
Author:      Mitch Lewis, BuzBiz DBS (https://buzbiz.com)

*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


register_activation_hook(__FILE__, 'pluginprefix_install');

function pluginprefix_install()
{

}

add_shortcode('business_loan_calculator', 'business_loan_calculator');

add_shortcode('mca_calculator', 'mca_loan_calculator');

function include_custom_css()
{
    wp_register_style('calc_css', plugins_url('styles.css', __FILE__));
    wp_enqueue_style('calc_css');
}
function include_b_calc_js()
{
    wp_register_script('calc_bl_js', plugins_url('b_calc_scripts.js', __FILE__));
    wp_enqueue_script('calc_bl_js');
}
function include_mca_calc_js() {
    wp_register_script('calc_mca_js', plugins_url('mca_calc_scripts.js', __FILE__));
    wp_enqueue_script('calc_mca_js');
}

add_action('wp_head', 'include_custom_css');

function business_loan_calculator($atts = [], $content = null)
{
    add_action('wp_footer', 'include_b_calc_js');

    $a = shortcode_atts( array(
      'show_footnotes' => "true",
    ), $atts );

    $lang_name = get_locale();

    $montharray=array(24,36,48,60);

    $term='Term Loan Calculator';
    $loanamt='';
    $noofpay="";
    $air='';
    $clfee='Closing Cost';
    $docfee='Funding Fee';
    $mnths="Months";
    $documentationfee='Documentation Fee';
    $calculate="Calculate";
    $url=get_bloginfo('template_directory');
    $poweredby='<a href='.get_site_url().'><img src='.$url.'/images/powered-by-cf-1x.png class="img_responsive"> </a>';
    $pleaseSelect = 'Please select';
    $pleaseSelectIntrestrate = 'Please select';
    $loanPlaceholder = 'Enter Loan Amount';

    $url=get_site_url();
    
    $page  ="<script>var site_url='$url'</script>";
    $page  .='<div id="business_loan_calculator" class="loan_calculator_form" >';
    $page .="<div id='generteform'>";
    $page .="<form id=businescalculator>";
    $page .="<div class='range_wrap'>";
    $page .="<div class='range' id='loan_amt'>";
    $page .="<label>Loan Amount</label>";
    $page .="<p>What is your desired loan amount?</p>";
    $page .='<h3 id="loan_amount_disp" contenteditable="true" spellcheck="false">$34,000</h3>';
    $page .="<input id='loan_amount' type=range data-controls='loan_amt' data-display_on='loan_amount_disp' min=1000 max=400000 name='amount' value='34000' step='125' placeholder='".$loanPlaceholder."'><br/>";
    $page .="</div>";
    $page .="<div class='range' id='paymnt_terms'>";
    $page .="<label>Payment Term</label>";
    $page .="<p>Select from 24 to 60 monthly payments</p>";
    $page .="<h3 id='payment_term_disp'>36 months</h3>";
    $page .="<input id='utm_source' type=hidden name='utm_sources'>";
    $page .="<input id='current_url' type=hidden name='current_url'>";
    $page .="<input id='gclid' type=hidden name='gclid'>";
    $page .="<input id='payment_term' data-controls='paymnt_terms' data-display_on='payment_term_disp' data-numSteps='3' type=range min=24 max=60 name='noofpayments' value='36' step='12'>";
    $page .="<br>";
    $page .="</div>";
    $page .='<div class="range" id="intrst_rate">';
    $page .='<label>Monthly Interest Rate</label>';
    $page .="<p>Select your approximate interest rate</p>";
    $page .='<h3 id="interest_rate_disp">2.25%</h3>';
    $page .="<input id='interest_rate' data-controls='intrst_rate' data-display_on='interest_rate_disp' data-numSteps='6' type=range min=1 max=2.5 name='intrestrate' value='2.25' step='0.25'>";
    $page .="</div>";
    $page .="</div>";
    $page .="<div class='amount_banner'>";
    $page .="<div class='left month_pmt'>";
    $page .="<p>Monthly Payment*</p>";
    $page .="</div>";
    $page .="<div class='display_amt'>";
    $page .="<span id='monthly_payment'>$1,388.05";
    $page .="</span>";
    $page .="</div>";
    $page .="<table  id='calc_more_info' class='calc_table' style='display: none;'><thead></thead>";
    $page .="<tbody>";
    $page .="<tr><td class='rTable_left' style='font-size: 16px'>Total Cost of the Loan<sup>1</sup>:</td><td class='rTable_right' style='font-size: 20px' id='total_cost'>$18,346.66</td></tr>";
    /*$page .="<tr><td class='rTable_left'>Funding Fee:</td><td class='rTable_right' id='funding_fee'>$0.00</td></tr>";
    $page .="<tr><td class='rTable_left'>Documentation Fee:</td><td class='rTable_right' id='docs_fee'>$0.00</td></tr>";*/
    $page .="<tr><td class='rTable_left'>Closing Fee<sup>2</sup>:</td><td class='rTable_right' id='closing_fee'>$2,376.6</td></tr>";
    $page .="<tr><td class='rTable_left'>Total Interest Paid:</td><td class='rTable_right' id='total_interest_paid'>$15,970.06</td></tr>";
    $page .="</tbody></table>";
    $page .="</div>";
    $page .="<div id='view_more_info' onclick='displayMoreInfo()'>view <span id='less_is_more'>more</span> info <span id='view_more_carat'>&or;<span></div>";
    $page .='<div class="col-md-12 text-center"><div onclick="window.location=\'/apply\'" class="button app_button"><a href="'.get_site_url().'/apply" id="checkifyouqualify" style="color:#fff" onclick="track_check();">Check If You Qualify <br>For a Business Loan</a></div></div>';
    $page .="<div class='clear'></div>";
    $page .="</form></div>";
    $page .="</div>";
    $page .='<div class="free_content">It’s free and won’t impact your credit score</div>';
    if($a['show_footnotes'] == 'true') {
        $page .="<div class=row><!--<div class=loan_calculator_powered>$poweredby</a></span></div>-->
        <div class=footnote><sup>*</sup> The loan terms are figures shown in calculation results are example figures and subject to final lender approval.</div>
        <div class=footnote><sup>1</sup> Represents total cost of the loan including Total Interest Paid & Closing Fee<!--, Documentation Fee, and Funding Fee.--></div>
        <div class=footnote><sup>2</sup> Assumes 4.99% closing fee against the approved loan amount. Closing fees may vary between 4.99% and 6.99%.</div>
        </div>";
    }
    return $page;
}


function mca_loan_calculator($atts = [], $content = null)
{
    add_action('wp_footer', 'include_mca_calc_js');

    $a = shortcode_atts( array(
      'show_footnotes' => "true",
    ), $atts );

    $lang_name = get_locale();

    $montharray=array(24,36,48,60);

    $term='Term Loan Calculator';
    $loanamt='';
    $noofpay="";
    $air='';
    $clfee='Closing Cost';
    $docfee='Funding Fee';
    $mnths="Months";
    $documentationfee='Documentation Fee';
    $calculate="Calculate";
    $url=get_bloginfo('template_directory');
    $poweredby='<a href='.get_site_url().'><img src='.$url.'/images/powered-by-cf-1x.png class="img_responsive"> </a>';
    $pleaseSelect = 'Please select';
    $pleaseSelectIntrestrate = 'Please select';
    $loanPlaceholder = 'Enter Loan Amount';

    $url=get_site_url();

    $page  ="<script>var site_url='$url'</script>";
    $page .='<style>
    #paymnt_terms input::-webkit-slider-runnable-track {
        background: linear-gradient(to right, #37B453 0%, #00b389 20%, #575b62 20%, #575b62 100%);
    }
    #paymnt_terms input::-moz-range-track {
        background: linear-gradient(to right, #37B453 0%, #00b389 20%, #575b62 20%, #575b62 100%);
    }
    #paymnt_terms input::-ms-track {
        background: linear-gradient(to right, #37B453 0%, #00b389 20%, #575b62 20%, #575b62 100%);
    }
    
    #intrst_rate input::-webkit-slider-runnable-track {
        background: linear-gradient(to right, #37B453 0%, #00b389 41.66666666666667%, #575b62 41.66666666666667%, #575b62 100%);
    }
    
    #intrst_rate input::-moz-range-track {
        background: linear-gradient(to right, #37B453 0%, #00b389 41.66666666666667%, #575b62 41.66666666666667%, #575b62 100%);
    }
    
    #intrst_rate input::-ms-track {
        background: linear-gradient(to right, #37B453 0%, #00b389 41.66666666666667%, #575b62 41.66666666666667%, #575b62 100%);
    }</style>';
    $page .='<div id="business_loan_calculator" class="loan_calculator_form" >';
    $page .="<div id='generteform'>";
    $page .="<form id=businescalculator>";
    $page .="<div class='range_wrap'>";
    $page .="<div class='range' id='loan_amt'>";
    $page .="<label>Loan Amount</label>";
    $page .="<p>How much money do you need?</p>";
    $page .='<h3 id="loan_amount_disp" contenteditable="true" spellcheck="false">$34,000</h3>';
    $page .="<input id='loan_amount' type=range data-controls='loan_amt' data-display_on='loan_amount_disp' min=1000 max=400000 name='amount' value='34000' step='125' placeholder='".$loanPlaceholder."'><br/>";
    $page .="</div>";
    $page .='<div class="range" id="intrst_rate">';
    $page .='<label>Factor Rate</label>';
    $page .="<p>Select your approximate factor rate (1.35 avg)</p>";
    $page .='<h3 id="interest_rate_disp">1.35</h3>';
    $page .="<input id='interest_rate' data-controls='intrst_rate' data-display_on='interest_rate_disp' data-numSteps='60' type=range min=1.1 max=1.7 name='intrestrate' value='1.35' step='0.01'>";
    $page .="<br></div>";
    $page .="<div class='range' id='paymnt_terms'>";
    $page .="<label>Payment Term</label>";
    $page .="<p>Select from 3 to 18 months (6 avg)</p>";
    $page .="<h3 id='payment_term_disp'>6 months</h3>";
    $page .="<input id='utm_source' type=hidden name='utm_sources'>";
    $page .="<input id='current_url' type=hidden name='current_url'>";
    $page .="<input id='gclid' type=hidden name='gclid'>";
    $page .="<input id='payment_term' data-controls='paymnt_terms' data-display_on='payment_term_disp' data-numSteps='15' type=range min=3 max=18 name='noofpayments' value='6' step='1'>";
    $page .="<br>";
    $page .="</div>";
    $page .="<div class='range' id='day_or_week'>";
    $page .="<label>Payment Frequency</label>";
    $page .="<div class='radio_group'>";
    $page .="<label for='daily'><input id='daily' checked='true' data-controls='day_or_week' data-display_on='day_or_week_disp' onclick='updateCalculations(\"daily\");' type='radio' name='day_or_week' value='daily'><span class='checkmark'></span>Daily</label>";
    $page .="<label for='weekly'><input id='weekly' data-controls='day_or_week' data-display_on='day_or_week_disp' onclick='updateCalculations(\"weekly\");'  type='radio' name='day_or_week' value='weekly'><span class='checkmark'></span>Weekly</span></label>";
    $page .="</div>";
    $page .="<br>";
    $page .="</div>";
    $page .="</div>";
    $page .="<div class='amount_banner'>";
    $page .="<div class='left month_pmt'>";
    $page .="<p><span id='day_or_week_disp'>Daily</span> Payment*</p>";
    $page .="</div>";
    $page .="<div class='display_amt'>";
    $page .="<span id='monthly_payment'>$355.81";
    $page .="</span>";
    $page .="</div>";
    $page .="<table  id='calc_more_info' class='calc_table' style='display: none;'><thead></thead>";
    $page .="<tbody>";
    $page .="<tr><td class='rTable_left' style='font-size: 16px'>Total Cost of the Loan<sup>1</sup>:</td><td class='rTable_right' style='font-size: 20px' id='total_cost'>$14,276.60</td></tr>";
    $page .="<tr><td class='rTable_left'>Closing Fee<sup>2</sup>:</td><td class='rTable_right' id='closing_fee'>$2,376.60</td></tr>";
    $page .="<tr><td class='rTable_left'>Total Interest Paid:</td><td class='rTable_right' id='total_interest_paid'>$11,900</td></tr>";
    $page .="</tbody></table>";
    $page .="</div>";
    $page .="<div id='view_more_info' onclick='displayMoreInfo()'>view <span id='less_is_more'>more</span> info <span id='view_more_carat'>&or;<span></div>";
    $page .='<div class="col-md-12 text-center"><div class="button app_button"><a href="'.get_site_url().'/apply" id="checkifyouqualify" style="color:#fff" onclick="track_check();">Check If You Qualify <br>For a Business Loan</a></div></div>';
    $page .="<div class='clear'></div>";
    $page .="</form></div>";
    $page .="</div>";
    $page .='<div class="free_content">It’s free and won’t impact your credit score</div>';
    if($a['show_footnotes'] == 'true') {
        $page .="<div class=row>
        <div class=footnote><sup>*</sup> The loan terms are figures shown in calculation results are estimated figures and subject to final lender approval.</div>
        <div class=footnote><sup>1</sup> Represents total cost of the loan including Total Interest Paid & Closing Fee<!--, Documentation Fee, and Funding Fee.--></div>
        <div class=footnote><sup>2</sup> Assumes 4.99% closing fee against the approved loan amount. Closing fees may vary between 4.99% and 6.99%.</div>
        </div>";
    }
    return $page;
}