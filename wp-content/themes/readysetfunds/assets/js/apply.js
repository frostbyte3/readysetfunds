var nameVaildate = /^[A-Za-zñáéíóúü]+$/i;
var emailValidate = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var phoneValidate = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
var businessValidate = /^(?!\s)(?!.*\s$)(?=.*[a-zA-Z0-9])[a-zA-Z0-9.,@ '~?!]{2,}$/;
var currencyValidate = /^\$?[\d,]+(\.\d*)?$/;
var stAddrValidate = /.*/i;
var unitValidate = /[A-z0-9]{0,10}/;
var cityValidate = /[A-Za-z0-9]{2,}$/;
var zipValidate = /^\d{5}(-\d{4})?$/;

var appData = {};

var curTab = 1;


var first_name = document.getElementById("first_name");
var last_name = document.getElementById("last_name");
var email = document.getElementById("email");
var phone_num = document.getElementById("phone_num");
var business_name = document.getElementById("business_name");
var loan_amt = document.getElementById("loan_amt");
var use_of_money = document.getElementById("use_of_money");
var marketing_source = document.getElementById("marketing_source");
var biz_street_address = document.getElementById("biz_street_address");
var biz_unit_num = document.getElementById("biz_unit_num");
var biz_city = document.getElementById("biz_city");
var biz_state = document.getElementById("biz_state");
var biz_zip_code = document.getElementById("biz_zip_code");
var entity_type = document.getElementById("entity_type");
var industry = document.getElementById("industry");
var annual_sales = document.getElementById("annual_sales");
var monthly_loan_pmts = document.getElementById("monthly_loan_pmts");
var years_in_business = document.getElementById("years_in_business");
var months_in_business = document.getElementById("months_in_business");
var num_employed = document.getElementById("num_employed");
var home_street_address = document.getElementById("home_street_address");
var home_unit_num = document.getElementById("home_unit_num");
var home_city = document.getElementById("home_city");
var home_state = document.getElementById("home_state");
var home_zip_code = document.getElementById("home_zip_code");
var residing_time = document.getElementById("residing_time");
var us_lived_length = document.getElementById("us_lived_length");
var home_own_type = document.getElementById("home_own_type");
var home_rent_pmt = document.getElementById("home_rent_pmt");
var num_financial_deps = document.getElementById("num_financial_deps");
var monthly_income = document.getElementById("monthly_income");
var dob_month = document.getElementById("dob_month");
var dob_day = document.getElementById("dob_day");
var dob_year = document.getElementById("dob_year");
var ssn = document.getElementById("ssn");

function errorCheck(tab = 'all') {
    //error_check
    if (first_name.value == '') {
        document.getElementById("fnameErr").innerHTML = "Please enter your first name.";
        scrollHere(first_name);
        return false;
    } else {
        if (nameVaildate.test(first_name.value)) {
            document.getElementById("fnameErr").innerHTML = "";
        } else {
            document.getElementById("fnameErr").innerHTML = "Please enter your name without numbers, spaces or symbols.";
            scrollHere(first_name);
            return false;
        }
    }

    if (last_name.value == '') {
        document.getElementById("lnameErr").innerHTML = "Please enter your last name.";
        scrollHere(last_name);
        return false;
    } else {
        if (nameVaildate.test(last_name.value)) {
            document.getElementById("lnameErr").innerHTML = "";
        } else {
            document.getElementById("lnameErr").innerHTML = "Please enter your name without numbers, spaces or symbols.";
            scrollHere(last_name);
            return false;
        }
    }

    if (email.value == '') {
        document.getElementById("emailErr").innerHTML = "Please enter your email.";
        scrollHere(email);
        return false;
    } else {
        if (emailValidate.test(email.value)) {
            document.getElementById("emailErr").innerHTML = "";
        } else {
            document.getElementById("emailErr").innerHTML = "Hmm, your email appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(email);
            return false;
        }
    }

    if (phone_num.value == '') {
        document.getElementById("phoneErr").innerHTML = "Please enter your phone number.";
        scrollHere(phone_num);
        return false;
    } else {
        if (phoneValidate.test(phone_num.value)) {
            document.getElementById("phoneErr").innerHTML = "";
        } else {
            document.getElementById("phoneErr").innerHTML = "Hmm, your phone number appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(phone_num);
            return false;
        }
    }

    if (business_name.value == '') {
        document.getElementById("bnameErr").innerHTML = "Please enter your business name.";
        scrollHere(business_name);
        return false;
    } else {
        if (businessValidate.test(business_name.value)) {
            document.getElementById("bnameErr").innerHTML = "";
        } else {
            document.getElementById("bnameErr").innerHTML = "Hmm, your business name appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(business_name);
            return false;
        }
    }

    if (loan_amt.value == '') {
        document.getElementById("loanAmtErr").innerHTML = "Please enter an amount in USD.";
        scrollHere(loan_amt);
        return false;
    } else {
        if (currencyValidate.test(loan_amt.value)) {
            document.getElementById("loanAmtErr").innerHTML = "";
        } else {
            document.getElementById("loanAmtErr").innerHTML = "Hmm, that number appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(loan_amt);
            return false;
        }
    }

    if (use_of_money.value == '0') {
        document.getElementById("purposeErr").innerHTML = "Please select a use.";
        scrollHere(use_of_money);
        return false;
    } else {
        document.getElementById("purposeErr").innerHTML = "";
    }

    if (tab == 1) {
        return true;
    }

    if (biz_street_address.value == '') {
        document.getElementById("bizStAddErr").innerHTML = "Please enter your street address.";
        scrollHere(biz_street_address);
        return false;
    } else {
        if (stAddrValidate.test(biz_street_address.value)) {
            document.getElementById("bizStAddErr").innerHTML = "";
        } else {
            document.getElementById("bizStAddErr").innerHTML = "Hmm, that street address appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(biz_street_address);
            return false;
        }
    }

    if (unitValidate.test(biz_unit_num.value)) {
        document.getElementById("bizUnitErr").innerHTML = "";
    } else {
        document.getElementById("bizUnitErr").innerHTML = "Hmm, that street address appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
        scrollHere(biz_unit_num);
        return false;
    }

    if (biz_city.value == '') {
        document.getElementById("bizCityErr").innerHTML = "Please enter your city.";
        scrollHere(biz_city);
        return false;
    } else {
        if (cityValidate.test(biz_city.value)) {
            document.getElementById("bizCityErr").innerHTML = "";
        } else {
            document.getElementById("bizCityErr").innerHTML = "Hmm, that city appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(biz_city);
            return false;
        }
    }

    if (biz_state.value == 'none') {
        document.getElementById("bizStateErr").innerHTML = "Please enter your state.";
        scrollHere(biz_state);
        return false;
    } else {
        document.getElementById("bizStateErr").innerHTML = "";
    }

    if (biz_zip_code.value == '') {
        document.getElementById("bizZipErr").innerHTML = "Please enter your zip code.";
        scrollHere(biz_zip_code);
        return false;
    } else {
        if (zipValidate.test(biz_zip_code.value)) {
            document.getElementById("bizZipErr").innerHTML = "";
        } else {
            document.getElementById("bizZipErr").innerHTML = "Hmm, that zip code appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(biz_zip_code);
            return false;
        }
    }

    if (entity_type.value == 'none') {
        document.getElementById("entityErr").innerHTML = "Please select your entity type.";
        scrollHere(entity_type);
        return false;
    } else {
        document.getElementById("entityErr").innerHTML = "";
    }

    if (industry.value == 'none') {
        document.getElementById("industryErr").innerHTML = "Please select your industry.";
        scrollHere(industry);
        return false;
    } else {
        document.getElementById("industryErr").innerHTML = "";
    }

    if (annual_sales.value == '$') {
        document.getElementById("salesErr").innerHTML = "Please enter annual gross sales.";
        scrollHere(annual_sales);
        return false;
    } else {
        if (currencyValidate.test(annual_sales.value)) {
            document.getElementById("salesErr").innerHTML = "";
        } else {
            document.getElementById("salesErr").innerHTML = "Hmm, that number appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(annual_sales);
            return false;
        }
    }

    if (monthly_loan_pmts.value == '$') {
        document.getElementById("monthlyLoansErr").innerHTML = "Please enter your monthly loan dues, enter 0 if none.";
        scrollHere(monthly_loan_pmts);
        return false;
    } else {
        if (currencyValidate.test(monthly_loan_pmts.value)) {
            document.getElementById("monthlyLoansErr").innerHTML = "";
        } else {
            document.getElementById("monthlyLoansErr").innerHTML = "Hmm, that number appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(monthly_loan_pmts);
            return false;
        }
    }

    if (years_in_business.value == '') {
        document.getElementById("bizAgeErr").innerHTML = "Please select a number of years.";
        scrollHere(years_in_business);
        return false;
    } else {
        document.getElementById("bizAgeErr").innerHTML = "";
    }

    if (months_in_business.value == '') {
        document.getElementById("bizAgeErr").innerHTML = "Please select a number of months.";
        scrollHere(months_in_business);
        return false;
    } else {
        document.getElementById("bizAgeErr").innerHTML = "";
    }

    if (num_employed.value == '') {
        document.getElementById("numEmployedErr").innerHTML = "Please select a number of employees.";
        scrollHere(num_employed);
        return false;
    } else {
        document.getElementById("numEmployedErr").innerHTML = "";
    }

    if (tab == 2) {
        return true;
    }

    if (home_street_address.value == '') {
        document.getElementById("homeStAddErr").innerHTML = "Please enter your street address.";
        scrollHere(home_street_address);
        return false;
    } else {
        if (stAddrValidate.test(home_street_address.value)) {
            document.getElementById("homeStAddErr").innerHTML = "";
        } else {
            document.getElementById("homeStAddErr").innerHTML = "Hmm, that street address appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(home_street_address);
            return false;
        }
    }

    if (unitValidate.test(home_unit_num.value)) {
        document.getElementById("homeUnitErr").innerHTML = "";
    } else {
        document.getElementById("homeUnitErr").innerHTML = "Hmm, that street address appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
        scrollHere(home_unit_num);
        return false;
    }

    if (home_city.value == '') {
        document.getElementById("homeCityErr").innerHTML = "Please enter your city.";
        scrollHere(home_city);
        return false;
    } else {
        if (cityValidate.test(home_city.value)) {
            document.getElementById("homeCityErr").innerHTML = "";
        } else {
            document.getElementById("homeCityErr").innerHTML = "Hmm, that city appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(home_city);
            return false;
        }
    }

    if (home_state.value == 'none') {
        document.getElementById("homeStateErr").innerHTML = "Please enter your state.";
        scrollHere(home_state);
        return false;
    } else {
        document.getElementById("homeStateErr").innerHTML = "";
    }

    if (home_zip_code.value == '') {
        document.getElementById("homeZipErr").innerHTML = "Please enter your zip code.";
        scrollHere(home_zip_code);
        return false;
    } else {
        if (zipValidate.test(home_zip_code.value)) {
            document.getElementById("homeZipErr").innerHTML = "";
        } else {
            document.getElementById("homeZipErr").innerHTML = "Hmm, that zip code appears invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(home_zip_code);
            return false;
        }
    }
    
    if (residing_time.value == '') {
        document.getElementById("resTimeErr").innerHTML = "Please select how long you've lived at that address.";
        scrollHere(residing_time);
        return false;
    } else {
        document.getElementById("resTimeErr").innerHTML = "";
    }
    
    if (us_lived_length.value == '') {
        document.getElementById("usTimeErr").innerHTML = "Please select how long you've lived in the US.";
        scrollHere(us_lived_length);
        return false;
    } else {
        document.getElementById("usTimeErr").innerHTML = "";
    }

    if (home_own_type.value == '') {
        document.getElementById("homeTypeErr").innerHTML = "Please select a type of ownership.";
        scrollHere(home_own_type);
        return false;
    } else {
        document.getElementById("homeTypeErr").innerHTML = "";
    }

    if (home_rent_pmt.value == '$') {
        document.getElementById("homeRentErr").innerHTML = "Please enter how much your residence costs per month.";
        scrollHere(home_zip_code);
        return false;
    } else {
        if (currencyValidate.test(home_rent_pmt.value)) {
            document.getElementById("homeRentErr").innerHTML = "";
        } else {
            document.getElementById("homeRentErr").innerHTML = "Hmm, that amount seems invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(home_zip_code);
            return false;
        }
    }

    if (num_financial_deps.value == '') {
        document.getElementById("finDepErr").innerHTML = "Please select a number of dependents, if 0 select 0.";
        scrollHere(num_financial_deps);
        return false;
    } else {
        document.getElementById("finDepErr").innerHTML = "";
    }

    if (monthly_income.value == '$') {
        document.getElementById("monIncErr").innerHTML = "Please enter how much your residence costs per month.";
        scrollHere(monthly_income);
        return false;
    } else {
        if (currencyValidate.test(monthly_income.value)) {
            document.getElementById("monIncErr").innerHTML = "";
        } else {
            document.getElementById("monIncErr").innerHTML = "Hmm, that amount seems invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(monthly_income);
            return false;
        }
    }

    if (dob_month.value == '') {
        document.getElementById("dobErr").innerHTML = "Please enter birth month.";
        scrollHere(dob_month);
        return false;
    } else {
        document.getElementById("dobErr").innerHTML = "";
    }


    if (dob_day.value == '') {
        document.getElementById("dobErr").innerHTML = "Please enter your birth day.";
        scrollHere(dob_day);
        return false;
    } else {
        if (/^\d{2}/.test(dob_day.value)) {
            document.getElementById("dobErr").innerHTML = "";
        } else {
            document.getElementById("dobErr").innerHTML = "Hmm, day seems invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(dob_day);
            return false;
        }
    }

    if (dob_year.value == '') {
        document.getElementById("dobErr").innerHTML = "Please enter your birth year.";
        scrollHere(dob_year);
        return false;
    } else {
        if (/^\d{4}/.test(dob_year.value)) {
            document.getElementById("dobErr").innerHTML = "";
        } else {
            document.getElementById("dobErr").innerHTML = "Hmm, year seems invalid. <a href='tel:8888059316'>Give us a call.</a>";
            scrollHere(dob_year);
            return false;
        }
    }

    if (ssn.value == '') {
        document.getElementById("ssnErr").innerHTML = "Please enter you social security number.";
        scrollHere(ssn);
        return false;
    } else {
        if (/^\d{9}/.test(ssn.value)) {
            document.getElementById("ssnErr").innerHTML = "";
        } else if (ssn.value.includes('-')) {
            document.getElementById("ssnErr").innerHTML = "Please enter your ssn without any dashes.";
            scrollHere(ssn);
            return false;
        } else {
            document.getElementById("ssnErr").innerHTML = "Please enter a valid ssn. <a href='tel:8888059316'>Or give us a call.</a>";
            scrollHere(ssn);
            return false;
        }
    }
    
    return true;
}

function changeToTab(tab, checkErr = 'false') {
    if (tab == 1) {
        document.getElementById("basic_info").classList.add("active");
        document.getElementById("business_info").classList.remove("active");
        document.getElementById("owner_info").classList.remove("active");

        document.getElementById("tab1").style.display = "block";
        document.getElementById("tab2").style.display = "none";
        document.getElementById("tab3").style.display = "none";

        document.getElementById("back").style.visibility = "hidden";
        document.getElementById("continue").style.visibility = "visible";
        document.getElementById("continue").innerHTML = 'Continue <i class="fa fa-angle-double-right">';
        curTab = 1;
    } else if (tab == 2) {
        if (checkErr && !errorCheck(1)) {
            return;
        }
        document.getElementById("basic_info").classList.remove("active");
        document.getElementById("business_info").classList.add("active");
        document.getElementById("owner_info").classList.remove("active");

        document.getElementById("tab1").style.display = "none";
        document.getElementById("tab2").style.display = "block";
        document.getElementById("tab3").style.display = "none";

        document.getElementById("back").style.visibility = "visible";
        document.getElementById("continue").style.visibility = "visible";
        document.getElementById("continue").innerHTML = 'Continue <i class="fa fa-angle-double-right">';
        curTab = 2;
        updateValues(1);
    } else if (tab == 3) {
        if (checkErr && !errorCheck(2)) {
            return;
        }
        document.getElementById("basic_info").classList.remove("active");
        document.getElementById("business_info").classList.remove("active");
        document.getElementById("owner_info").classList.add("active");

        document.getElementById("tab1").style.display = "none";
        document.getElementById("tab2").style.display = "none";
        document.getElementById("tab3").style.display = "block";

        document.getElementById("back").style.visibility = "visible";
        document.getElementById("continue").style.visibility = "visible";
        document.getElementById("continue").innerHTML = "Submit";
        curTab = 3;

        updateValues(2);
    }
}

function partialSubmit(data) {
    console.log(data);
}

function updateValues(tab) {
    if (tab == 1) {
        Object.assign(appData, {
            first_name: first_name.value,
            last_name: last_name.value,
            email: email.value,
            phone_num: phone_num.value,
            business_name: business_name.value,
            loan_amt: loan_amt.value,
            use_of_money: use_of_money.value,
            marketing_source: marketing_source.value
        });

        partialSubmit(appData);
    } else if (tab == 2) {
        Object.assign(appData, {
            biz_street_address: biz_street_address.value,
            biz_city: biz_city.value,
            biz_state: biz_state.value,
            biz_zip_code: biz_zip_code.value,
            entity_type: entity_type.value,
            industry: industry.value,
            annual_sales: annual_sales.value,
            monthly_loan_pmts: monthly_loan_pmts.value,
            years_in_business: years_in_business.value,
            months_in_business: months_in_business.value,
            num_employed: num_employed.value
        });

        partialSubmit(appData);
    }
}

function goForward() {
    if(curTab == 3) {
        if(!errorCheck()) {
            console.log('missing vals');
            return false;
        }
        console.log("submitting...");
        document.getElementById("applicationForm").submit();
    } else {
        changeToTab(curTab + 1, true);
    }
}

function goBack() {
    changeToTab(curTab - 1, true);
}

function fillHomeAddress() {
    let checked = document.getElementById("same_address").checked;

    if (checked) {
        home_street_address.value = biz_street_address.value;
        home_unit_num.value = biz_unit_num.value;
        home_city.value = biz_city.value;
        home_state.value = biz_state.value;
        home_zip_code.value = biz_zip_code.value;

        home_street_address.disabled = true;
        home_unit_num.disabled = true;
        home_city.disabled = true;
        home_state.disabled = true;
        home_zip_code.disabled = true;
    } else {
        home_street_address.value = '';
        home_unit_num.value = '';
        home_city.value = '';
        home_state.value = '';
        home_zip_code.value = '';

        home_street_address.disabled = false;
        home_unit_num.disabled = false;
        home_city.disabled = false;
        home_state.disabled = false;
        home_zip_code.disabled = false;
    }

}

function rentTypeChanged(e) {
    console.log(e.value);
    rentPmtInpt = document.getElementById("home_rent_pmt");
    if (e.value == 'Owned Or No Payment') {
        rentPmtInpt.value = '$0';
        rentPmtInpt.disabled = true;
    } else {
        if (rentPmtInpt.value == '$0')
            rentPmtInpt.value = '';
        rentPmtInpt.disabled = false;
    }
}

function scrollHere(obj) {
    window.scroll(0,findPos(obj) - 147);
}


/**
 *  Polyfills
 */

if (typeof Object.assign !== 'function') {
    // Must be writable: true, enumerable: false, configurable: true
    Object.defineProperty(Object, "assign", {
        value: function assign(target, varArgs) { // .length of function is 2
            'use strict';
            if (target === null || target === undefined) {
                throw new TypeError('Cannot convert undefined or null to object');
            }

            var to = Object(target);

            for (var index = 1; index < arguments.length; index++) {
                var nextSource = arguments[index];

                if (nextSource !== null && nextSource !== undefined) {
                    for (var nextKey in nextSource) {
                        // Avoid bugs when hasOwnProperty is shadowed
                        if (Object.prototype.hasOwnProperty.call(nextSource, nextKey)) {
                            to[nextKey] = nextSource[nextKey];
                        }
                    }
                }
            }
            return to;
        },
        writable: true,
        configurable: true
    });
}

function findPos(obj) {
    var curtop = 0;
    if (obj.offsetParent) {
        do {
            curtop += obj.offsetTop;
        } while (obj = obj.offsetParent);
    return curtop;
    }
}


function fillForm(tab) {
    if (tab == 1) {
        first_name.value = "testfname";
        last_name.value = "testlname";
        email.value = "test@test.com";
        phone_num.value = "(561) 454-3455";
        business_name.value = "testbname";
        loan_amt.value = "$34,303";
        use_of_money.value = "Growth Capital";
        marketing_source.value = "Referral";
    } else if (tab == 2) {
        biz_street_address.value = '123 happy st';
        biz_unit_num.value = '234';
        biz_city.value = 'los angeles';
        biz_state.value = 'California';
        biz_zip_code.value = '91405';
        entity_type.value = 'Sole Proprietorship';
        industry.value = 'All Telecommunications';
        annual_sales.value = '$35,443,334';
        monthly_loan_pmts.value = '$1,421';
        years_in_business.value = '1';
        months_in_business.value = '6';
        num_employed.value = '5 - 10';
    } else if (tab == 3) {
        home_street_address.value = "123 happy st";
        home_unit_num.value = "123";
        home_city.value = "Los Angeles";
        home_state.value = "California";
        home_zip_code.value = "90021";
        residing_time.value = "4";
        us_lived_length.value = "11+";
        home_own_type.value = "Rent";
        home_rent_pmt.value = "$2533";
        num_financial_deps.value = "2";
        monthly_income.value = "$23,433";
        dob_month.value = "December";
        dob_day.value = "23";
        dob_year.value = "1997";
        ssn.value = "123-45-6789";
    }
}