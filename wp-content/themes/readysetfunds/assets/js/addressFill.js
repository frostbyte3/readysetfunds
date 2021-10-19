var states = {
    "AL": "Alabama",
    "AK": "Alaska",
    "AS": "American Samoa",
    "AZ": "Arizona",
    "AR": "Arkansas",
    "CA": "California",
    "CO": "Colorado",
    "CT": "Connecticut",
    "DE": "Delaware",
    "DC": "District Of Columbia",
    "FM": "Federated States Of Micronesia",
    "FL": "Florida",
    "GA": "Georgia",
    "GU": "Guam",
    "HI": "Hawaii",
    "ID": "Idaho",
    "IL": "Illinois",
    "IN": "Indiana",
    "IA": "Iowa",
    "KS": "Kansas",
    "KY": "Kentucky",
    "LA": "Louisiana",
    "ME": "Maine",
    "MH": "Marshall Islands",
    "MD": "Maryland",
    "MA": "Massachusetts",
    "MI": "Michigan",
    "MN": "Minnesota",
    "MS": "Mississippi",
    "MO": "Missouri",
    "MT": "Montana",
    "NE": "Nebraska",
    "NV": "Nevada",
    "NH": "New Hampshire",
    "NJ": "New Jersey",
    "NM": "New Mexico",
    "NY": "New York",
    "NC": "North Carolina",
    "ND": "North Dakota",
    "MP": "Northern Mariana Islands",
    "OH": "Ohio",
    "OK": "Oklahoma",
    "OR": "Oregon",
    "PW": "Palau",
    "PA": "Pennsylvania",
    "PR": "Puerto Rico",
    "RI": "Rhode Island",
    "SC": "South Carolina",
    "SD": "South Dakota",
    "TN": "Tennessee",
    "TX": "Texas",
    "UT": "Utah",
    "VT": "Vermont",
    "VI": "Virgin Islands",
    "VA": "Virginia",
    "WA": "Washington",
    "WV": "West Virginia",
    "WI": "Wisconsin",
    "WY": "Wyoming"
}

var placeSearch, bizautocomplete, homeautocomplete;

var bizAddrFieldMap = {
    street_number: 'biz_street_num',
    route: 'biz_street_route',
    locality: 'biz_city',
    administrative_area_level_1: 'biz_state',
    postal_code: 'biz_zip_code'
}

var bizAddrForm = {
    biz_street_num: 'short_name',
    biz_street_route: 'long_name',
    biz_city: 'long_name',
    biz_state: 'short_name',
    biz_zip_code: 'short_name'
};

var homeAddrFieldMap = {
    street_number: 'home_street_num',
    route: 'home_street_route',
    locality: 'home_city',
    administrative_area_level_1: 'home_state',
    postal_code: 'home_zip_code'
}

var homeAddrForm = {
    home_street_num: 'short_name',
    home_street_route: 'long_name',
    home_city: 'long_name',
    home_state: 'short_name',
    home_zip_code: 'short_name'
};

function initAutocomplete() {
    // Create the bizautocomplete object, restricting the search predictions to
    // geographical location types.
    bizautocomplete = new google.maps.places.Autocomplete(
        document.getElementById('biz_street_address'), {
            types: ['geocode'],
            componentRestrictions: {
                country: "us"
            }
        });

    // Avoid paying for data that you don't need by restricting the set of
    // place fields that are returned to just the address components.
    bizautocomplete.setFields(['address_component']);

    // When the user selects an address from the drop-down, populate the
    // address fields in the form.
    bizautocomplete.addListener('place_changed', fillInBizAddress);

    //Do it again for home address

    homeautocomplete = new google.maps.places.Autocomplete(
        document.getElementById('home_street_address'), {
            types: ['geocode'],
            componentRestrictions: {
                country: "us"
            }
        }
    );
    homeautocomplete.setFields(['address_component']);
    homeautocomplete.addListener('place_changed', fillInHomeAddress);
}

function fillInBizAddress() {
    // Get the place details from the bizautocomplete object.
    var place = bizautocomplete.getPlace();

    for (var component in bizAddrForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = bizAddrFieldMap[place.address_components[i].types[0]];
        if (bizAddrForm[addressType]) {
            var val = place.address_components[i][bizAddrForm[addressType]];
            if(addressType == 'biz_state') {
                val = states[val];
            }
            document.getElementById(addressType).value = val;
        }
    }

    let space = ' ';
    if(document.getElementById("biz_street_num").value == '') {
        space = '';
    }

    document.getElementById("biz_street_address").value = document.getElementById("biz_street_num").value + space + document.getElementById("biz_street_route").value;
}

function fillInHomeAddress() {
    // Get the place details from the homeautocomplete object.
    var place = homeautocomplete.getPlace();

    for (var component in homeAddrForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
    }

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.
    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = homeAddrFieldMap[place.address_components[i].types[0]];
        if (homeAddrForm[addressType]) {
            var val = place.address_components[i][homeAddrForm[addressType]];
            if(addressType == 'home_state') {
                val = states[val];
            }
            document.getElementById(addressType).value = val;
        }
    }

    let space = ' ';
    if(document.getElementById("home_street_num").value == '') {
        space = '';
    }

    document.getElementById("home_street_address").value = document.getElementById("home_street_num").value + space + document.getElementById("home_street_route").value;
}

// Bias the bizautocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            var geolocation = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
            var circle = new google.maps.Circle(
                { center: geolocation, radius: position.coords.accuracy });
            bizautocomplete.setBounds(circle.getBounds());
        });
    }
}