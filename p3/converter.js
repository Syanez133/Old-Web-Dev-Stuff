//HANDLES DISPLAYING THE RESULT 
var report = function (input) {
    document.getElementById("result").innerHTML = "Conversion is " + input;
};
// CONVERTS METERS TO KM ALSO ERROR CHECKS 
function km_convert(meter) {
    var km = 1000;
    var result = meter / km;
    if (isNaN(result)) {


        return report("Is not a number! Try again.");
    }

    return report(parseFloat(result).toFixed(2) + " Km");

};
// CONVERTS METERS TO MILES ALSO ERROR CHECKS 
function miles_convert(meter) {
    var miles = 1609.344;
    var result = meter / miles;
    if (isNaN(result)) {


        return report("Is not a number! Try again.");
    }

    return report(parseFloat(result).toFixed(2) + " Miles");

};
// CONVERTS KILOMETERS TO METERS ALSO ERROR CHECKS 
function km_convert_m(kilometer) {
    var m = 1000;
    var result = m * kilometer;
    if (isNaN(result)) {


        return report("Is not a number! Try again.");
    }

    return report(parseFloat(result).toFixed(2) + " Meters");

};
// CONVERTS MILES TO METERS ALSO ERROR CHECKS 
function miles_convert_m(miles) {
    var meter = 1609.344;
    var result = miles * meter;
    if (isNaN(result)) {


        return report("Is not a number! Try again.");
    }

    return report(parseFloat(result).toFixed(2) + " Meters");

};
//CHECKS WHICH RADIO BUTTON IS CHECKED AND CALLS THE APPROPRIATE FUNCTION TO EXECUTE THE CODE
document.getElementById("calculate").onclick = function () {
    var input = document.getElementById("unit").value;


    // ERROR CHECK FOR NAN IF TRUE THEN SEND WRITE ERROR
    if (document.getElementById("m_to_km").checked == true) {

        km_convert(input);
    } else if (document.getElementById("m_to_miles").checked == true) {
        miles_convert(input);
    } else if (document.getElementById("km_to_m").checked == true) {
        km_convert_m(input);
    } else if (document.getElementById("miles_to_m").checked == true) {
        miles_convert_m(input);
    }
};

//"linting.enabled": false;