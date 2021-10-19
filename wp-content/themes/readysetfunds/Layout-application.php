<?php
/*
Template Name: Application
*/

/**
 * The template for displaying pages
 * This layout is used for the Application.
 */

$wordpressUrl = get_site_url();
?>

<?php get_header('application'); ?>

<div class="app_form">
    <form method="POST" action="<?php echo $wordpressUrl; ?>/confirm_application.php" accept-charset="UTF-8"
        id="applicationForm" autocomplete="off" enctype="multipart/form-data">
        <div class="app_container tab1" id="tab1">
            <h1 class="head">Ready.. <a href="javascript:void(0)" onClick="fillForm(1)" style="color: unset;">Set..</a> Apply!</h1>
            <p class="subhead">Filling out our secure application form is as easy as 1-2-3. So let's get growing!</p>
            <div class="app_form_wrapper">
                <div class="clearfix">
                    <h4 class="hr lright">Personal Info</h4>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label id="first_name_label" for="first_name">First Name<span class="required">*</span></label>
                        <input class="app_form-input" name="first_name" type="text" pattern="[A-Za-z]{1,32}"
                            id="first_name" required>
                        <div class="error"><span id="fnameErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="last_name_label" for="last_name">Last Name<span class="required">*</span></label>
                        <input class="app_form-input" name="last_name" type="text" pattern="[A-Za-z]{1,32}"
                            id="last_name" required>
                        <div class="error"><span id="lnameErr"></span></div>
                    </div>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label id="email_label" for="email">Best Contact Email<span class="required">*</span> <a class="tip"
                                data-toggle="tooltip"
                                title="Please make sure to enter your primary email. Your primary email will be used for communication with Ready Set Funds as well as receiving and e-signing your loan contracts."><i
                                    class="fa fa-question-circle"></i></a></label>
                        <input class="app_form-input" name="email" type="text" id="email"
                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                        <div class="error"><span id="emailErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="phone_num_label" for="phone_num">Mobile Phone Number<span class="required">*</span></label>
                        <input class="app_form-input phone" maxlength="14" id="phone_num"
                            pattern="^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$" name="phone_num" type="tel"
                            required>
                        <div class="error"><span id="phoneErr"></span></div>
                    </div>
                </div>

                <div class="clearfix">
                    <h4 class="hr lright">Business Info</h4>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label id="business_name_label" for="business_name">Business Name<span class="required">*</span></label>
                        <input class="app_form-input" name="business_name" type="text"
                            pattern="^(?!\s)(?!.*\s$)(?=.*[a-zA-Z0-9])[a-zA-Z0-9,@ '~?!]{2,}$" id="business_name"
                            required>
                        <div class="error"><span id="bnameErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="loan_amt_label" for="loan_amt">How Much Money Do You Need?<span class="required">*</span></label>
                        <input class="app_form-input currency" name="loan_amt" value="<?php echo $_REQUEST['loan_amount_required'] ?? '$'; ?>" pattern="^\$?[\d,]+(\.\d*)?$"
                            type="tel" id="loan_amt" required>
                        <div class="error"><span id="loanAmtErr"></span></div>
                    </div>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label id="use_of_money_label" for="use_of_money">What Do You Need A Loan For?<span class="required">*</span> <a
                                class="tip" data-toggle="tooltip"
                                title="Please input what you plan to use the money for. This helps us find the perfect loan for your situation."><i
                                    class="fa fa-question-circle"></i></a></label>
                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" id="use_of_money" name="use_of_money">
                                <option value="0">Please Select</option>
                                <option value="Startup">Startup</option>
                                <option value="Growth Capital">Growth Capital</option>
                                <option value="Working Capital">Working Capital</option>
                                <option value="Inventory Purchase">Inventory Purchase</option>
                                <option value="Equipment Purchase">Equipment Purchase</option>
                                <option value="Vehicle Purchase">Vehicle Purchase</option>
                                <option value="Debt Refinance">Debt Refinance</option>
                                <option value="A/R Finance">A/R Finance</option>
                                <option value="Acquisition/Buyout Capital">Acquisition/Buyout Capital</option>
                                <option value="Other">Other</option>
                            </select>
                        </span>
                        <div class="error"><span id="purposeErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="marketing_source_label" for="marketing_source">How did you hear about us? (optional)</label>
                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" id="marketing_source" name="marketing_source">
                                <option value="" selected="selected">Please Select</option>
                                <option value="Sales Agent">Sales Agent</option>
                                <option value="Referral">Referral</option>
                                <option value="Google or Another Search Engine">Google or Another Search Engine</option>
                                <option value="LinkedIn">LinkedIn</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Twitter">Twitter</option>
                                <option value="Email Newsletter">Email Newsletter</option>
                                <option value="Blog">Blog</option>
                                <option value="Radio">Radio</option>
                                <option value="Television">Television</option>
                                <option value="Digital Ad">Digital Ad</option>
                                <option value="Mail">Mail</option>
                                <option value="Networking Event">Networking Event</option>
                                <option value="News">News</option>
                                <option value="Flyers">Flyers</option>
                                <option value="Workshop">Workshop</option>
                                <option value="Returning Applicant">Returning Applicant</option>
                                <option value="Other">Other</option>
                            </select>
                        </span>
                        <div class="error"><span id="marketingErr"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="app_container tab2" id="tab2" style="display: none;">
            <h1 class="head">Tell Us About <a href="javascript:void(0)" onClick="fillForm(2)" style="color: unset;">Your Business</a></h1>
            <p class="subhead">We'll use this information to tailor your terms.</p>
            <div class="app_form_wrapper">
                <div class="clearfix">
                    <h4 class="hr lright">Business Address</h4>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-two_thirds fleft">
                        <label id="biz_street_address_label" for="biz_street_address">Street Address<span class="required">*</span></label>
                        <input class="app_form-input" name="biz_street_address" type="text" pattern="[A-Za-z0-9 ]{1,32}"
                            id="biz_street_address" onfocus="geolocate()" autocomplete="off" required>
                        <div class="error"><span id="bizStAddErr"></span></div>
                        <input type="hidden" id="biz_street_num" name="biz_street_num">
                        <input type="hidden" id="biz_street_route" name="biz_street_route">
                    </div>
                    <div class="app_form-group form-one_third fright">
                        <label id="biz_unit_num_label" for="biz_unit_num">Suite/Apt/Unit #</label>
                        <input class="app_form-input" name="biz_unit_num" type="text" pattern="[A-z0-9]{1,10}"
                            id="biz_unit_num">
                        <div class="error"><span id="bizUnitErr"></span></div>
                    </div>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-five_twelths fleft">
                        <label id="biz_city_label" for="biz_city">City<span class="required">*</span></label>
                        <input class="app_form-input" name="biz_city" type="text" id="biz_city"
                            pattern="[A-Za-z0-9]{2,}$" required>
                        <div class="error"><span id="bizCityErr"></span></div>
                    </div>
                    <div class="app_form-group form-five_twelths fcenter">
                        <label id="biz_state_label" for="biz_state">State<span class="required">*</span></label>
                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" id="biz_state" name="biz_state">
                                <option value="none" selected="selected">Please Select</option>
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="Arizona">Arizona</option>
                                <option value="Arkansas">Arkansas</option>
                                <option value="California">California</option>
                                <option value="Colorado">Colorado</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="Delaware">Delaware</option>
                                <option value="Florida">Florida</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Idaho">Idaho</option>
                                <option value="Illinois">Illinois</option>
                                <option value="Indiana">Indiana</option>
                                <option value="Iowa">Iowa</option>
                                <option value="Kansas">Kansas</option>
                                <option value="Kentucky">Kentucky</option>
                                <option value="Louisiana">Louisiana</option>
                                <option value="Maine">Maine</option>
                                <option value="Maryland">Maryland</option>
                                <option value="Massachusetts">Massachusetts</option>
                                <option value="Michigan">Michigan</option>
                                <option value="Minnesota">Minnesota</option>
                                <option value="Mississippi">Mississippi</option>
                                <option value="Missouri">Missouri</option>
                                <option value="Montana">Montana</option>
                                <option value="New York">New York</option>
                                <option value="Nebraska">Nebraska</option>
                                <option value="Nevada">Nevada</option>
                                <option value="New Hampshire">New Hampshire</option>
                                <option value="New Jersey">New Jersey</option>
                                <option value="New Mexico">New Mexico</option>
                                <option value="North Carolina">North Carolina</option>
                                <option value="North Dakota">North Dakota</option>
                                <option value="Ohio">Ohio</option>
                                <option value="Oklahoma">Oklahoma</option>
                                <option value="Oregon">Oregon</option>
                                <option value="Pennsylvania">Pennsylvania</option>
                                <option value="Rhode Island">Rhode Island</option>
                                <option value="South Carolina">South Carolina</option>
                                <option value="South Dakota">South Dakota</option>
                                <option value="Tennessee">Tennessee</option>
                                <option value="Texas">Texas</option>
                                <option value="Utah">Utah</option>
                                <option value="Vermont">Vermont</option>
                                <option value="Virginia">Virginia</option>
                                <option value="Washington">Washington</option>
                                <option value="Washington D.C.">Washington D.C.</option>
                                <option value="West Virginia">West Virginia</option>
                                <option value="Wisconsin">Wisconsin</option>
                                <option value="Wyoming">Wyoming</option>
                            </select>
                        </span>
                        <div class="error"><span id="bizStateErr"></span></div>
                    </div>
                    <div class="app_form-group form-one_sixth fright">
                        <label id="biz_zip_code_label" for="biz_zip_code">Zip Code<span class="required">*</span></label>
                        <input class="app_form-input" id="biz_zip_code" pattern="^\d{5}(-\d{4})?$" name="biz_zip_code"
                            type="tel" placeholder="00000" required>
                        <div class="error"><span id="bizZipErr"></span></div>
                    </div>
                </div>

                <div class="clearfix">
                    <h4 class="hr lright">Business Information</h4>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label id="entity_type_label" for="entity_type">Legal Entity Type<span class="required">*</span></label>
                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" id="entity_type" name="entity_type">
                                <option value="none">Please Select</option>
                                <option value="Sole Proprietorship">Sole Proprietorship</option>
                                <option value="C Corporation">C Corporation</option>
                                <option value="S Corporation">S Corporation</option>
                                <option value="Limited Liability Company">Limited Liability Company</option>
                                <option value="Partnership">Partnership</option>
                            </select>
                        </span>
                        <div class="error"><span id="entityErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="industry_label" for="industry">Industry<span class="required">*</span></label>
                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" id="industry" name="industry">
                                <option value="none">Please Select</option>
                                <option value="Administrative Services - All Other Business Support Services">
                                    Administrative Services - All Other Business Support Services</option>
                                <option value="Administrative Services - All Other Non-Business Support Services">
                                    Administrative Services - All Other Non-Business Support Services</option>
                                <option value="Administrative Services - Collection Agencies">Administrative Services -
                                    Collection Agencies</option>
                                <option value="Administrative Services - Employment Agencies">Administrative Services -
                                    Employment Agencies</option>
                                <option value="Administrative Services - Facilities Support Services">Administrative
                                    Services - Facilities Support Services</option>
                                <option value="Administrative Services - Office Admin Services">Administrative Services
                                    - Office Admin Services</option>
                                <option value="Administrative Services - Repossession Services">Administrative Services
                                    - Repossession Services</option>
                                <option value="Adult Related Industry">Adult Related Industry</option>
                                <option value="Advertising - Distribution Services">Advertising - Distribution Services
                                </option>
                                <option value="Advertising - Marketing &amp; Advertising Agencies">Advertising -
                                    Marketing &amp; Advertising Agencies</option>
                                <option value="Advertising - TV &amp; Radio">Advertising - TV &amp; Radio</option>
                                <option value="Agriculture &amp; Farming - Animal Production">Agriculture &amp; Farming
                                    - Animal Production</option>
                                <option value="Agriculture &amp; Farming - Crop Production">Agriculture &amp; Farming -
                                    Crop Production</option>
                                <option value="Agriculture &amp; Farming - Dairy Production">Agriculture &amp; Farming -
                                    Dairy Production</option>
                                <option value="All other Traveler Accomodation">All other Traveler Accomodation</option>
                                <option value="All Telecommunications">All Telecommunications</option>
                                <option value="Artists, Writers, and Performers">Artists, Writers, and Performers
                                </option>
                                <option value="Auction Houses">Auction Houses</option>
                                <option value="Automotive Repair">Automotive Repair</option>
                                <option value="Barber Shops">Barber Shops</option>
                                <option value="Beauty Salons">Beauty Salons</option>
                                <option value="Administrative Services - All Other Business Support Services">Business
                                    Cleaning Services</option>
                                <option value="Casinos &amp; Gambling">Casinos &amp; Gambling</option>
                                <option value="Catering">Catering</option>
                                <option value="Commercial &amp; Industrial Machinery Repair and Maintenance">Commercial
                                    &amp; Industrial Machinery Repair and Maintenance</option>
                                <option value="Construction - Building">Construction - Building</option>
                                <option value="Construction - Civil Engineering">Construction - Civil Engineering
                                </option>
                                <option value="Construction - Contractors">Construction - Contractors</option>
                                <option value="Consulting Services">Consulting Services</option>
                                <option value="Consumer Electronic Repair &amp; Maintenance">Consumer Electronic Repair
                                    &amp; Maintenance</option>
                                <option value="Consumer Good Rentals">Consumer Good Rentals</option>
                                <option value="Daycare Services">Daycare Services</option>
                                <option value="Dealership - New Vehicles">Dealership - New Vehicles</option>
                                <option value="Dealership - Used Vehicles">Dealership - Used Vehicles</option>
                                <option value="Education - Non-Schools">Education - Non-Schools</option>
                                <option value="Education - Schools">Education - Schools</option>
                                <option value="Education - Support Services">Education - Support Services</option>
                                <option value="Entertainment - Agents &amp; Managers">Entertainment - Agents &amp;
                                    Managers</option>
                                <option value="Entertainment - Event Management">Entertainment - Event Management
                                </option>
                                <option value="Entertainment - Theaters">Entertainment - Theaters</option>
                                <option value="Finance - Brokers">Finance - Brokers</option>
                                <option value="Finance - Commercial Banking">Finance - Commercial Banking</option>
                                <option value="Finance - Consumer Lending">Finance - Consumer Lending</option>
                                <option value="Finance - Credit Card Issuance">Finance - Credit Card Issuance</option>
                                <option value="Finance - Credit Card Services">Finance - Credit Card Services</option>
                                <option value="Finance - Credit Unions">Finance - Credit Unions</option>
                                <option value="Finance - Financial Advisors">Finance - Financial Advisors</option>
                                <option value="Finance - Others">Finance - Others</option>
                                <option value="Finance - Pay Day Lenders">Finance - Pay Day Lenders</option>
                                <option value="Finance - Real Estate Lending">Finance - Real Estate Lending</option>
                                <option value="Finance - Securities Brokerage">Finance - Securities Brokerage</option>
                                <option value="Finance - Transaction Processing">Finance - Transaction Processing
                                </option>
                                <option value="Fishing &amp; Other Marine Life Production">Fishing &amp; Other Marine
                                    Life Production</option>
                                <option value="Food Service Contractors">Food Service Contractors</option>
                                <option value="Funeral Homes &amp; Funeral Services">Funeral Homes &amp; Funeral
                                    Services</option>
                                <option value="Government Institutions">Government Institutions</option>
                                <option value="Healthcare - All Other Outpatient Care Centers">Healthcare - All Other
                                    Outpatient Care Centers</option>
                                <option value="Healthcare - Dentists">Healthcare - Dentists</option>
                                <option value="Healthcare - Family Planning Centers">Healthcare - Family Planning
                                    Centers</option>
                                <option value="Healthcare - Home Healthcare Services">Healthcare - Home Healthcare
                                    Services</option>
                                <option value="Healthcare - Hospitals">Healthcare - Hospitals</option>
                                <option value="Healthcare - Medical Laboratories">Healthcare - Medical Laboratories
                                </option>
                                <option value="Healthcare - Physical Therapists">Healthcare - Physical Therapists
                                </option>
                                <option value="Healthcare - Physicians">Healthcare - Physicians</option>
                                <option value="Retail Trade - All Others">Home Cleaning Service</option>
                                <option value="Hotels &amp; Motels">Hotels &amp; Motels</option>
                                <option value="HR - Outsourced Service Agencies">HR - Outsourced Service Agencies
                                </option>
                                <option value="Information Services - Data Processing &amp; Mining Services">Information
                                    Services - Data Processing &amp; Mining Services</option>
                                <option value="Information Services - Others">Information Services - Others</option>
                                <option value="Insurance - Insurance Agencies &amp; Brokers">Insurance - Insurance
                                    Agencies &amp; Brokers</option>
                                <option value="Insurance - Insurance Companies">Insurance - Insurance Companies</option>
                                <option value="Insurance - Others">Insurance - Others</option>
                                <option value="IT - Hardware Services">IT - Hardware Services</option>
                                <option value="IT - Other Computer Related Services">IT - Other Computer Related
                                    Services</option>
                                <option value="IT - Software Services">IT - Software Services</option>
                                <option value="Laundries and Drycleaners">Laundries and Drycleaners</option>
                                <option value="Manufacturing">Manufacturing</option>
                                <option value="Marketing - Direct / Multi Level Marketing">Marketing - Direct / Multi
                                    Level Marketing</option>
                                <option value="Marketing - Research &amp; Polling">Marketing - Research &amp; Polling
                                </option>
                                <option value="Mining">Mining</option>
                                <option value="Nail Salons">Nail Salons</option>
                                <option value="Non-Profit Organization">Non-Profit Organization</option>
                                <option value="Oil &amp; Gas Extraction">Oil &amp; Gas Extraction</option>
                                <option value="Other Personal Care Services">Other Personal Care Services</option>
                                <option value="Parking Lot &amp; Garages">Parking Lot &amp; Garages</option>
                                <option value="Pawn Shops">Pawn Shops</option>
                                <option value="Pet Care Services">Pet Care Services</option>
                                <option value="Photography">Photography</option>
                                <option value="Postal Service">Postal Service</option>
                                <option value="Printing">Printing</option>
                                <option value="Professional Services - Architectual Services">Professional Services -
                                    Architectual Services</option>
                                <option value="Professional Services - Building Inspection Services">Professional
                                    Services - Building Inspection Services</option>
                                <option value="Professional Services - Engineering Services">Professional Services -
                                    Engineering Services</option>
                                <option value="Professional Services - Landscaping Services">Professional Services -
                                    Landscaping Services</option>
                                <option value="Professional Services - Lawyers">Professional Services - Lawyers</option>
                                <option value="Professional Services - Officers of Certified Public Accountants">
                                    Professional Services - Officers of Certified Public Accountants</option>
                                <option value="Professional Services - Payroll Services">Professional Services - Payroll
                                    Services</option>
                                <option value="Professional Services - Surveying and Mapping Services">Professional
                                    Services - Surveying and Mapping Services</option>
                                <option value="Professional Services - Tax Preparation Services">Professional Services -
                                    Tax Preparation Services</option>
                                <option value="Public Administration - Civic and Social Organizations">Public
                                    Administration - Civic and Social Organizations</option>
                                <option
                                    value="Public Administration - Environment, Conservation and Wildlife Organizations">
                                    Public Administration - Environment, Conservation and Wildlife Organizations
                                </option>
                                <option value="Public Administration - Human Rights Organizations">Public Administration
                                    - Human Rights Organizations</option>
                                <option value="Public Administration - Political Organizations">Public Administration -
                                    Political Organizations</option>
                                <option value="Public Administration - Professional Organizations">Public Administration
                                    - Professional Organizations</option>
                                <option value="Public Administration - Religious Organizations">Public Administration -
                                    Religious Organizations</option>
                                <option value="Publishing">Publishing</option>
                                <option value="Real Estate - Agents &amp; Brokers">Real Estate - Agents &amp; Brokers
                                </option>
                                <option value="Real Estate - Appraisers">Real Estate - Appraisers</option>
                                <option value="Real Estate - Lessors">Real Estate - Lessors</option>
                                <option value="Real Estate - Property Management">Real Estate - Property Management
                                </option>
                                <option value="Restaurants &amp; Bars">Restaurants &amp; Bars</option>
                                <option value="Retail Trade - Convenience Stores">Retail Store</option>
                                <option value="Retail Trade - All Others">Retail Trade - All Others</option>
                                <option value="Retail Trade - Convenience Stores">Retail Trade - Convenience Stores
                                </option>
                                <option value="Retail Trade - Furniture Stores">Retail Trade - Furniture Stores</option>
                                <option value="Tourism - All Other Travel Arrangment &amp; Reservation Services">Tourism
                                    - All Other Travel Arrangment &amp; Reservation Services</option>
                                <option value="Tourism - Tour Operators">Tourism - Tour Operators</option>
                                <option value="Tourism - Travel Agencies">Tourism - Travel Agencies</option>
                                <option value="Translation &amp; Interpretation Services">Translation &amp;
                                    Interpretation Services</option>
                                <option value="Transportation - Limousine Service">Transportation - Limousine Service
                                </option>
                                <option value="Transportation - Others">Transportation - Others</option>
                                <option value="Transportation - Trucking">Transportation - Trucking</option>
                                <option value="Utilities">Utilities</option>
                                <option value="Veterinary Services">Veterinary Services</option>
                                <option value="Waste Collection and/or Treatment Services">Waste Collection and/or
                                    Treatment Services</option>
                                <option value="Wholesale Trade - All Others">Wholesale Trade - All Others</option>
                                <option value="Wholesale Trade - Clothing">Wholesale Trade - Clothing</option>
                            </select>
                        </span>
                        <div class="error"><span id="industryErr"></span></div>
                    </div>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label id="annual_sales_label" for="annual_sales">Annual Gross Sales<span class="required">*</span></label>
                        <input class="app_form-input currency" name="annual_sales" value="$"
                            pattern="^\$?[\d,]+(\.\d*)?$" type="tel" id="annual_sales" required>
                        <div class="error"><span id="salesErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="monthly_loan_pmts_label" for="monthly_loan_pmts">Monthly Business Loan Payments (Enter "0" if none)<span
                                class="required">*</span></label>
                        <input class="app_form-input currency" name="monthly_loan_pmts" value="$"
                            pattern="^\$?[\d,]+(\.\d*)?$" type="tel" id="monthly_loan_pmts" required>
                        <div class="error"><span id="monthlyLoansErr"></span></div>
                    </div>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label id="years_in_business_label" for="years_in_business">How Long Have You Been In Business?<span
                                class="required">*</span></label>
                        <span class="select_icon sel_half fleft">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" id="years_in_business" name="years_in_business">
                                <option value="" selected="selected">Years</option>
                                <option value="0">0 Years</option>
                                <option value="1">1 Years</option>
                                <option value="2">2 Years</option>
                                <option value="3">3 Years</option>
                                <option value="4">4 Years</option>
                                <option value="5">5 Years</option>
                                <option value="6">6 Years</option>
                                <option value="7">7 Years</option>
                                <option value="8">8 Years</option>
                                <option value="9">9 Years</option>
                                <option value="10">10 Years</option>
                                <option value="11+">11+ Years</option>
                            </select>
                        </span>
                        <span class="select_icon sel_half fright">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" id="months_in_business" name="months_in_business">
                                <option value="" selected="selected">Months</option>
                                <option value="0">0 Months</option>
                                <option value="1">1 Months</option>
                                <option value="2">2 Months</option>
                                <option value="3">3 Months</option>
                                <option value="4">4 Months</option>
                                <option value="5">5 Months</option>
                                <option value="6">6 Months</option>
                                <option value="7">7 Months</option>
                                <option value="8">8 Months</option>
                                <option value="9">9 Months</option>
                                <option value="10">10 Months</option>
                                <option value="11">11 Months</option>
                            </select>
                        </span>
                        <div class="error"><span id="bizAgeErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="num_employed_label" for="num_employed">Number of Employees<span class="required">*</span></label>
                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" id="num_employed" name="num_employed">
                                <option value="" selected="selected"># Employed</option>
                                <option value="0 - 5">0 - 5</option>
                                <option value="5 - 10">5 - 10</option>
                                <option value="10 - 25">10 - 25</option>
                                <option value="25 - 100">25 - 100</option>
                                <option value="100+">100+</option>
                            </select>
                        </span>
                        <div class="error"><span id="numEmployedErr"></span></div>
                    </div>
                </div>
            </div>
        </div>
        <?php wp_nonce_field('apply_nonce'); ?>
        <div class="app_container tab3" id="tab3" style="display: none;">
            <h1 class="head">Almost <a href="javascript:void(0)" onClick="fillForm(3)" style="color: unset;">Done!</a></h1>
            <p class="subhead">Last step, finish this and, if approved, you'll get funds in no time!</p>
            <div class="app_form_wrapper">
                <div class="clearfix">
                    <h4 class="hr lright">Your Address</h4>
                </div>
                <div class="app_form-row">
                    <div class="home_addr_checkbox">
                        <label>
                            <input class="check_input" type="checkbox" onclick="fillHomeAddress()" name="same_address"
                                id="same_address" style="vertical-align: top;">
                            <span class="check"><i class="check-icon fa fa-check"></i></span>
                            My home address is the same as my business address
                        </label>
                    </div>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-two_thirds fleft">
                        <label id="home_street_address_label" for="home_street_address">Home Street Address<span class="required">*</span></label>
                        <input class="app_form-input" name="home_street_address" type="text"
                            pattern="[A-Za-z0-9 ]{1,32}" id="home_street_address" onfocus="geolocate()"
                            autocomplete="off" required>
                        <div class="error"><span id="homeStAddErr"></span></div>
                        <input type="hidden" id="home_street_num" name="home_street_num">
                        <input type="hidden" id="home_street_route" name="home_street_route">
                    </div>
                    <div class="app_form-group form-one_third fright">
                        <label id="" for="home_unit_num">Suite/Apt/Unit #</label>
                        <input class="app_form-input" name="home_unit_num" type="text" pattern="[A-z0-9]{1,10}"
                            id="home_unit_num">
                        <div class="error"><span id="homeUnitErr"></span></div>
                    </div>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-five_twelths fleft">
                        <label id="home_city_label" for="home_city">City<span class="required">*</span></label>
                        <input class="app_form-input" name="home_city" type="text" id="home_city"
                            pattern="[A-Za-z0-9]{2,}$" required>
                        <div class="error"><span id="homeCityErr"></span></div>
                    </div>
                    <div class="app_form-group form-five_twelths fcenter">
                        <label id="home_state_label" for="home_state">State<span class="required">*</span></label>
                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" id="home_state" name="home_state">
                                <option value="none" selected="selected">Please Select</option>
                                <option value="Alabama">Alabama</option>
                                <option value="Alaska">Alaska</option>
                                <option value="Arizona">Arizona</option>
                                <option value="Arkansas">Arkansas</option>
                                <option value="California">California</option>
                                <option value="Colorado">Colorado</option>
                                <option value="Connecticut">Connecticut</option>
                                <option value="Delaware">Delaware</option>
                                <option value="Florida">Florida</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Hawaii">Hawaii</option>
                                <option value="Idaho">Idaho</option>
                                <option value="Illinois">Illinois</option>
                                <option value="Indiana">Indiana</option>
                                <option value="Iowa">Iowa</option>
                                <option value="Kansas">Kansas</option>
                                <option value="Kentucky">Kentucky</option>
                                <option value="Louisiana">Louisiana</option>
                                <option value="Maine">Maine</option>
                                <option value="Maryland">Maryland</option>
                                <option value="Massachusetts">Massachusetts</option>
                                <option value="Michigan">Michigan</option>
                                <option value="Minnesota">Minnesota</option>
                                <option value="Mississippi">Mississippi</option>
                                <option value="Missouri">Missouri</option>
                                <option value="Montana">Montana</option>
                                <option value="New York">New York</option>
                                <option value="Nebraska">Nebraska</option>
                                <option value="Nevada">Nevada</option>
                                <option value="New Hampshire">New Hampshire</option>
                                <option value="New Jersey">New Jersey</option>
                                <option value="New Mexico">New Mexico</option>
                                <option value="North Carolina">North Carolina</option>
                                <option value="North Dakota">North Dakota</option>
                                <option value="Ohio">Ohio</option>
                                <option value="Oklahoma">Oklahoma</option>
                                <option value="Oregon">Oregon</option>
                                <option value="Pennsylvania">Pennsylvania</option>
                                <option value="Rhode Island">Rhode Island</option>
                                <option value="South Carolina">South Carolina</option>
                                <option value="South Dakota">South Dakota</option>
                                <option value="Tennessee">Tennessee</option>
                                <option value="Texas">Texas</option>
                                <option value="Utah">Utah</option>
                                <option value="Vermont">Vermont</option>
                                <option value="Virginia">Virginia</option>
                                <option value="Washington">Washington</option>
                                <option value="Washington D.C.">Washington D.C.</option>
                                <option value="West Virginia">West Virginia</option>
                                <option value="Wisconsin">Wisconsin</option>
                                <option value="Wyoming">Wyoming</option>
                            </select>
                        </span>
                        <div class="error"><span id="homeStateErr"></span></div>
                    </div>
                    <div class="app_form-group form-one_sixth fright">
                        <label id="home_zip_code_label" for="home_zip_code">Zip Code<span class="required">*</span></label>
                        <input class="app_form-input" id="home_zip_code" pattern="^\d{5}(-\d{4})?$" name="home_zip_code"
                            type="tel" placeholder="00000" required>
                        <div class="error"><span id="homeZipErr"></span></div>
                    </div>
                </div>
                <div class="clearfix">
                    <h4 class="hr lright">Address Info</h4>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label id="residing_time_label" for="residing_time">How long have you lived at the address above?<span
                                class="required">*</span></label>

                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" name="residing_time" id="residing_time" required>
                                <option value="" selected="selected">Years</option>
                                <option value="0">0 Years</option>
                                <option value="1">1 Years</option>
                                <option value="2">2 Years</option>
                                <option value="3">3 Years</option>
                                <option value="4">4 Years</option>
                                <option value="5">5 Years</option>
                                <option value="6">6 Years</option>
                                <option value="7">7 Years</option>
                                <option value="8">8 Years</option>
                                <option value="9">9 Years</option>
                                <option value="10">10 Years</option>
                                <option value="11+">11+ Years</option>
                            </select>
                        </span>
                        <div class="error"><span id="resTimeErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="us_lived_length_label" for="us_lived_length">How long have you lived in the US?<span
                                class="required">*</span></label>

                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" name="us_lived_length" id="us_lived_length" required>
                                <option value="" selected="selected">Years</option>
                                <option value="0">0 Years</option>
                                <option value="1">1 Years</option>
                                <option value="2">2 Years</option>
                                <option value="3">3 Years</option>
                                <option value="4">4 Years</option>
                                <option value="5">5 Years</option>
                                <option value="6">6 Years</option>
                                <option value="7">7 Years</option>
                                <option value="8">8 Years</option>
                                <option value="9">9 Years</option>
                                <option value="10">10 Years</option>
                                <option value="11+">11+ Years</option>
                            </select>
                        </span>
                        <div class="error"><span id="usTimeErr"></span></div>
                    </div>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label id="home_own_type_label" for="home_own_type">How do you own your home?<span class="required">*</span></label>
                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select onchange="rentTypeChanged(this)" class="app_form-input" id="home_own_type"
                                name="home_own_type">
                                <option value="" selected="selected">Please Select</option>
                                <option value="Mortgage">Mortgage</option>
                                <option value="Rent">Rent</option>
                                <option value="Owned Or No Payment">Owned or Paid Off (No Payment)</option>
                            </select>
                        </span>
                        <div class="error"><span id="homeTypeErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="home_rent_pmt_label" for="home_rent_pmt">Monthly Rent/Mortgage Payment<span class="required">*</span></label>
                        <input class="app_form-input currency" type="tel" value="$" id="home_rent_pmt"
                            name="home_rent_pmt" pattern="^\$?[\d,]+(\.\d*)?$" required>
                        <div class="error"><span id="homeRentErr"></span></div>
                    </div>
                </div>
                <div class="clearfix">
                    <h4 class="hr lright">Credit Info</h4>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label id="num_financial_deps_label" for="num_financial_deps">Number of Financial Dependent(s)<span class="required">*</span></label>
                        <span class="select_icon">
                            <img src="<?php echo bloginfo('template_directory') ?>/assets/images/icon_sel.png" alt="v">
                            <select class="app_form-input" id="num_financial_deps" name="num_financial_deps">
                                <option value="" selected="selected">Please Select</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10 or more</option>
                            </select>
                        </span>
                        <div class="error"><span id="finDepErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="monthly_income_label" for="monthly_income">Monthly Household Income
                            <sup><a href="javascript:void(0);" class="tooltips sub_tooltip"><span
                                        class="toolup">1</span></a></sup> <span class="required"> * </span>
                            <a class="ttltip" data-toggle="tooltip"
                                title="This includes applicant income, spouse income (if applicable), government payments, and company earnings after all expenses."><i
                                    class="fa fa-question-circle"></i></a></label>
                        <input class="app_form-input currency" name="monthly_income" type="tel"
                            pattern="^\$?[\d,]+(\.\d*)?$" id="monthly_income" value="$" required>
                        <div class="superscript">1 Alimony, child support, or separate maintenance income need not be
                            revealed if you do not wish to have it considered as a basis for repaying this obligation.
                        </div>
                        <div class="error"><span id="monIncErr"></span></div>
                    </div>
                </div>
                <div class="app_form-row">
                    <div class="app_form-group form-left">
                        <label class="dob">Date of Birth<span class="required">*</span></label>
                        <div class="dob_section form-one_half fleft">
                            <label id="dob_month_label" for="dob_month">Month</label>
                            <span class="select_icon">
                                <img src="<?php echo bloginfo('template_directory')?>/assets/images/icon_sel.png"
                                    alt="v">
                                <select class="app_form-input" id="dob_month" name="dob_month" required>
                                    <option value="" selected="selected">Please Select</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </span>
                        </div>
                        <div class="dob_section form-one_fourth fcenter">
                            <label id="dob_day_label" for="dob_day">Day</label>
                            <input class="app_form-input" type="tel" id="dob_day" name="dob_day" maxlength="2"
                                minlength="2" required="">
                        </div>
                        <div class="dob_section form-one_fourth fright">
                            <label id="dob_year_label" for="dob_year">Year</label>
                            <input class="app_form-input" type="tel" id="dob_year" name="dob_year" maxlength="4"
                                minlength="4" required="">
                        </div>
                        <div class="error"><span id="dobErr"></span></div>
                    </div>
                    <div class="app_form-group form-right">
                        <label id="ssn_label" for="ssn">Social Security Number<span class="required">*</span></label>
                        <div class="input_group"><input class="app_form-input" maxlength="9"
                                autocomplete="off" id="ssn" name="ssn" type="password" value=""><span
                                class="input_group-addition"><i class="glyphicon lock_icon"></i></span></div>
                        <div class="error"><span id="ssnErr"></span></div>
                        <span class="accent">This will NOT affect your credit score!</span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<?php get_footer('application'); ?>