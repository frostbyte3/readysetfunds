<?php
$amountInput = $_REQUEST['amount'];
$amount = str_replace(array("$", ","), "", $amountInput);

if ($amount=='') {
    $amount=10000;
}
if (!isset($_REQUEST['noofpayments']) || $_REQUEST['noofpayments'] == '') {
    $noofpayments=12;
} else {
    $noofpayments=$_REQUEST['noofpayments'];
}
if (empty($_REQUEST['interest-rate']) || !isset($_REQUEST['interest-rate'])) {
    $interestRateInput = 1;
} else {
    $interestRateInput = $_REQUEST['interest-rate'];
}
$interestRate=str_replace('%', '', $interestRateInput);
$months = $noofpayments;
$interest = $interestRate / 100;
$pmtamount = $interest * -$amount * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
$monthelyrate= $interestRate;

for ($i=0;$i<$noofpayments;$i++) {
    if ($i==0) {
        $beginingamount=$amount;
    } else {
        $beginingamount=$endingbalance;
    }

    $interest=($beginingamount*$monthelyrate)/100;
    $total +=$interest;
    $principal=$pmtamount-$interest;
    $endingbalance=$beginingamount-$principal;
}

$fundingfee=0;
$docfee=0;
$closingfee=0;

if ($amount <=50000) {
    $closingfee=($amount*6.99)/100;
} else {
    $closingfee=($amount*5)/100;
}

$loancost=$total+$closingfee;
$totalpaybackamount=$total+$closingfee+$fundingfee+$docfee;

$values = array(
    "loan_amnt"=>number_format($amountInput, 2),
    "num_payments"=>$noofpayments,
    "interest_rate"=>$interestRate,
    "closing_fee"=>number_format($closingfee, 2),
    "doc_fee"=>number_format($docfee, 2),
    "total_interest"=>number_format($total, 2),
    "funding_fee"=>number_format($fundingfee, 2),
    "cost_of_loan"=>number_format($totalpaybackamount, 2),
    "monthly_payment"=>number_format($pmtamount, 2)
);

echo json_encode($values);
?>