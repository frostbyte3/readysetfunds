var sheet = document.createElement('style'),
    $rangeInput = $('.range input'),
    prefs = ['webkit-slider-runnable-track', 'moz-range-track', 'ms-track'];

document.body.appendChild(sheet);

function getTrackStyle(el, oldStyle) {
    var curVal = el.value,
        id = el.getAttribute('data-controls'),
        style = oldStyle;

    var val = curVal / el.max * 100;

    if (id == 'paymnt_terms') val = (curVal - 3) / el.getAttribute('data-numSteps') * 100;

    if (id == 'intrst_rate') val = (curVal * 100 - 110) / 60 * 100;

    // Set active label
    $('.range-labels li').removeClass('active selected');

    var curLabel = $('.range-labels').find('li:nth-child(' + curVal + ')');

    curLabel.addClass('active selected');
    curLabel.prevAll().addClass('selected');

    // remove old BG gradient
    var stylesToRemove = new RegExp("#" + id + "(.*?)}", "g");
    style = style.replace(stylesToRemove, '');

    // add back in new BG gradient
    for (var i = 0; i < prefs.length; i++) {
        style += '#' + id + ' input::-' + prefs[i] + '{background: linear-gradient(to right, #37B453 0%, #00b389 ' + val + '%, #575b62 ' + val + '%, #575b62 100%)}';
    }

    return style;
}

function updateCalculations(day_or_week = 'null') {
    weekly_q = document.getElementById("weekly").checked;
    if(day_or_week != 'null') {
        weekly_q = day_or_week == 'weekly';
    }

    loanAmount = document.getElementById('loan_amount').value;
    paymentTerm = document.getElementById('payment_term').value;
    interestRate = document.getElementById('interest_rate').value;

    dailyPayment = document.getElementById('monthly_payment');
    totalCost = document.getElementById('total_cost');
    totalInterest = document.getElementById('total_interest_paid');
    closingFee = document.getElementById('closing_fee');

    months = paymentTerm;

    pmt_freq = 21.5;

    if(weekly_q) {
        pmt_freq = 4;
    }


    daily_pymnt = loanAmount * interestRate / (months * pmt_freq);

    monthelyrate = interestRate;
    begginingAmount = loanAmount;
    endingBalance = begginingAmount;
    total = 0;
    for (let i = 0; i < months; i++) {
        begginingAmount = endingBalance;

        interest = begginingAmount * monthelyrate;
        total += interest;
        principal = daily_pymnt - interest;
        endingBalance = begginingAmount - principal;
    }

    fundingfee = 0;
    docfee = 0;
    closingfee = 0;

    if (loanAmount <= 50000) {
        closingfee = loanAmount * 6.99 / 100;
    } else {
        closingfee = loanAmount * 5 / 100;
    }

    total = loanAmount * interestRate - loanAmount;

    loancost = total + closingfee;
    totalpaybackamount = total + closingfee + fundingfee + docfee;

    dailyPayment.innerHTML = format(daily_pymnt);
    totalCost.innerHTML = format(loancost);
    totalInterest.innerHTML = format(total);
    closingFee.innerHTML = format(closingfee);
}

function updateRange(e) {
    sheet.textContent = getTrackStyle(e, sheet.textContent);
    displayOn = e.getAttribute('data-display_on');
    newValue = e.value;
    switch (displayOn) {
        case 'loan_amount_disp':
            newValue = format(e.value);
            break;
        case 'payment_term_disp':
            newValue = e.value + ' months';
            break;
        case 'interest_rate_disp':
            newValue = e.value;
            break;
    }

    document.getElementById(displayOn).innerHTML = newValue;
}

function updateRangesAndCalculations() {
    let ranges = [document.getElementById('loan_amount'), document.getElementById('payment_term'), document.getElementById('interest_rate')];

    ranges.forEach(updateRange);

    updateCalculations();
}

$rangeInput.on('input', function () {
    sheet.textContent = getTrackStyle(this, sheet.textContent);
    displayOn = this.getAttribute('data-display_on');
    newValue = this.value;
    switch (displayOn) {
        case 'loan_amount_disp':
            newValue = format(this.value);
            break;
        case 'payment_term_disp':
            newValue = this.value + ' months';
            break;
        case 'interest_rate_disp':
            newValue = this.value;
            break;
    }

    document.getElementById(displayOn).innerHTML = newValue;

    updateCalculations();
});

// Change input value on label click
$('.range-labels li').on('click', function () {
    var index = $(this).index();

    $rangeInput.val(index + 1).trigger('input');
});

function displayMoreInfo() {
    moreInfo = document.getElementById('calc_more_info');
    less_or_more = document.getElementById('less_is_more');
    carat = document.getElementById('view_more_carat');
    if (moreInfo.style.display == 'none' || moreInfo.style.display == '') {
        moreInfo.style.display = "table";
        carat.innerHTML = '&and;';
    } else {
        moreInfo.style.display = "none";
        carat.innerHTML = '&or;';
    }

    if (less_or_more.innerHTML == 'more') {
        less_or_more.innerHTML = 'less';
    } else {
        less_or_more.innerHTML = 'more';
    }

    let footer = document.getElementById("pre-footer");
    if (window.innerWidth > 991 && footer) {
        if (less_or_more.innerHTML == 'more') {
            footer.style.marginTop = '250px';
        } else {
            footer.style.marginTop = '400px';
        }
    }
}

$('body').on('focus', '[contenteditable]', function () {
    const $this = $(this);
    $this.data('before', $this.html());
}).on('blur keyup paste input', '[contenteditable]', function () {
    const $this = $(this);
    if ($this.data('before') !== $this.html()) {
        $this.data('before', $this.html());
        $this.trigger('change');
    }
});

