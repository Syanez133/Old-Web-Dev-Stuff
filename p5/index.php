<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <title>Project 5</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <!-- Bootstrap Css -->
    <link href="bootstrap-assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style -->
    <link href="plugins/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.theme.css" rel="stylesheet">
    <link href="plugins/owl-carousel/owl.transitions.css" rel="stylesheet">
    <link href="plugins/Lightbox/dist/css/lightbox.css" rel="stylesheet">
    <link href="plugins/Icons/et-line-font/style.css" rel="stylesheet">
    <link href="plugins/animate.css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
     <link href="mycss.css" rel="stylesheet">
    <!-- Icons Font -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Preloader
	============================================= -->
    <div class="preloader"><i class="fa fa-circle-o-notch fa-spin fa-2x"></i></div>
    <!-- Header
	============================================= -->
    <section class="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><img src="myimg/logo/logo.png" class="img-responsive" alt="logo"></a>
                </div>
                <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                    <div class="col-md-8 col-xs-12 nav-wrap">
                        <ul class="nav navbar-nav">
                            <li><a href="#welcome" class="page-scroll">Home</a></li>
                            <li><a href="#services" class="page-scroll">Converter</a></li>
                          <!--  <li><a href="#team" class="page-scroll">About</a></li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <br>
       
    </section>

    <!-- Welcome
	============================================= -->
    
    <section id="welcome">
        <div class="container">
            <h2>Welcome To <span>My Currency Converter</span></h2>
            <hr class="sep">
            <p></p>
            <img class="img-responsive center-block wow fadeInUp" data-wow-delay=".3s" src="myimg/welcome/welcome.png" alt="logo">
        </div>
    </section>

    <!-- Services

	============================================= -->
        
         <section id="services">
        <div class="container">
                <h2>Currency Converter</h2>
                <hr class="light-sep">
                <p>This site will let you convert different currencies, please enter numeric values to begin the conversion.</p>
            </div>
        </div>
    <?php
   $currency = 0;
    function currencyConverter($currency_from,$currency_to,$currency_input){
       
       
            
        
    
    
    $amount = urlencode($currency_input);
    $from_Currency = urlencode($currency_from);
    $to_Currency = urlencode($currency_to);
    $get = file_get_contents("https://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency");
    $get = explode("<span class=bld>",$get);
    $get = explode("</span>",$get[0]);  
    $currency_output = preg_replace("/[^0-9\.]/", null, $get[0]);
    
    return $currency_output;

}

$currency_from = "";
$currency_to = "";
$currency_input = 1;

if (isset($_POST['currency_from']) && isset($_POST['currency_to']) && isset($_POST['currency_input']))
{
	$currency_from = $_POST['currency_from'];
	$currency_to = $_POST['currency_to'];
	$currency_input = $_POST['currency_input'];
    
    if(is_numeric($currency_input))
    {
        $currency = currencyConverter($currency_from,$currency_to,$currency_input);
    
        $currency = round($currency, 2);
        // Populate a specific paragraph or div with result
    }
    
}

echo <<<_END
<html>
	<head>
	</head>
	<body>
	<form method="post" action="">
		<label id = "amount">Please Enter amount:</label>
		<input type="text" id = "entered amount"; 
              border: solid 1px white" name="currency_input" />
              
        <label id = "currency">Select Currency (From):</label>
        <select name="currency_from" id = "currencyselection"; 
              
              border: solid 1px white" >
            <option value="USD">US Dollar</option>
            <option value="EUR">Euro</option>
            <option value="INR">Indian Rupee</option>
            <option  value="AED">United Arab Emirates Dirham (AED)</option>
            <option  value="AFN">Afghan Afghani (AFN)</option>
            <option  value="ALL">Albanian Lek (ALL)</option>
            <option  value="AMD">Armenian Dram (AMD)</option>
            <option  value="ANG">Netherlands Antillean Guilder (ANG)</option>
            <option  value="AOA">Angolan Kwanza (AOA)</option>
            <option  value="ARS">Argentine Peso (ARS)</option>
            <option  value="AUD">Australian Dollar (A$)</option>
            <option  value="AWG">Aruban Florin (AWG)</option>
            <option  value="AZN">Azerbaijani Manat (AZN)</option>
            <option  value="BAM">Bosnia-Herzegovina Convertible Mark (BAM)</option>
            <option  value="BBD">Barbadian Dollar (BBD)</option>
            <option  value="BDT">Bangladeshi Taka (BDT)</option>
            <option  value="BGN">Bulgarian Lev (BGN)</option>
            <option  value="BHD">Bahraini Dinar (BHD)</option>
            <option  value="BIF">Burundian Franc (BIF)</option>
            <option  value="BMD">Bermudan Dollar (BMD)</option>
            <option  value="BND">Brunei Dollar (BND)</option>
            <option  value="BOB">Bolivian Boliviano (BOB)</option>
            <option  value="BRL">Brazilian Real (R$)</option>
            <option  value="BSD">Bahamian Dollar (BSD)</option>
            <option  value="BTC">Bitcoin (฿)</option>
            <option  value="BTN">Bhutanese Ngultrum (BTN)</option>
            <option  value="BWP">Botswanan Pula (BWP)</option>
            <option  value="BYR">Belarusian Ruble (BYR)</option>
            <option  value="BZD">Belize Dollar (BZD)</option>
            <option  value="CAD">Canadian Dollar (CA$)</option>
            <option  value="CDF">Congolese Franc (CDF)</option>
            <option  value="CHF">Swiss Franc (CHF)</option>
            <option  value="CLF">Chilean Unit of Account (UF) (CLF)</option>
            <option  value="CLP">Chilean Peso (CLP)</option>
            <option  value="CNH">CNH (CNH)</option>
            <option  value="CNY">Chinese Yuan (CN¥)</option>
            <option  value="COP">Colombian Peso (COP)</option>
            <option  value="CRC">Costa Rican Colón (CRC)</option>
            <option  value="CUP">Cuban Peso (CUP)</option>
            <option  value="CVE">Cape Verdean Escudo (CVE)</option>
            <option  value="CZK">Czech Republic Koruna (CZK)</option>
            <option  value="DEM">German Mark (DEM)</option>
            <option  value="DJF">Djiboutian Franc (DJF)</option>
            <option  value="DKK">Danish Krone (DKK)</option>
            <option  value="DOP">Dominican Peso (DOP)</option>
            <option  value="DZD">Algerian Dinar (DZD)</option>
            <option  value="EGP">Egyptian Pound (EGP)</option>
            <option  value="ERN">Eritrean Nakfa (ERN)</option>
            <option  value="ETB">Ethiopian Birr (ETB)</option>
            <option  value="EUR">Euro (€)</option>
            <option  value="FIM">Finnish Markka (FIM)</option>
            <option  value="FJD">Fijian Dollar (FJD)</option>
            <option  value="FKP">Falkland Islands Pound (FKP)</option>
            <option  value="FRF">French Franc (FRF)</option>
            <option  value="GBP">British Pound (£)</option>
            <option  value="GEL">Georgian Lari (GEL)</option>
            <option  value="GHS">Ghanaian Cedi (GHS)</option>
            <option  value="GIP">Gibraltar Pound (GIP)</option>
            <option  value="GMD">Gambian Dalasi (GMD)</option>
            <option  value="GNF">Guinean Franc (GNF)</option>
            <option  value="GTQ">Guatemalan Quetzal (GTQ)</option>
            <option  value="GYD">Guyanaese Dollar (GYD)</option>
            <option  value="HKD">Hong Kong Dollar (HK$)</option>
            <option  value="HNL">Honduran Lempira (HNL)</option>
            <option  value="HRK">Croatian Kuna (HRK)</option>
            <option  value="HTG">Haitian Gourde (HTG)</option>
            <option  value="HUF">Hungarian Forint (HUF)</option>
            <option  value="IDR">Indonesian Rupiah (IDR)</option>
            <option  value="IEP">Irish Pound (IEP)</option>
            <option  value="ILS">Israeli New Sheqel (₪)</option>
            <option  value="INR">Indian Rupee (Rs.)</option>
            <option  value="IQD">Iraqi Dinar (IQD)</option>
            <option  value="IRR">Iranian Rial (IRR)</option>
            <option  value="ISK">Icelandic Króna (ISK)</option>
            <option  value="ITL">Italian Lira (ITL)</option>
            <option  value="JMD">Jamaican Dollar (JMD)</option>
            <option  value="JOD">Jordanian Dinar (JOD)</option>
            <option  value="JPY">Japanese Yen (¥)</option>
            <option  value="KES">Kenyan Shilling (KES)</option>
            <option  value="KGS">Kyrgystani Som (KGS)</option>
            <option  value="KHR">Cambodian Riel (KHR)</option>
            <option  value="KMF">Comorian Franc (KMF)</option>
            <option  value="KPW">North Korean Won (KPW)</option>
            <option  value="KRW">South Korean Won (₩)</option>
            <option  value="KWD">Kuwaiti Dinar (KWD)</option>
            <option  value="KYD">Cayman Islands Dollar (KYD)</option>
            <option  value="KZT">Kazakhstani Tenge (KZT)</option>
            <option  value="LAK">Laotian Kip (LAK)</option>
            <option  value="LBP">Lebanese Pound (LBP)</option>
            <option  value="LKR">Sri Lankan Rupee (LKR)</option>
            <option  value="LRD">Liberian Dollar (LRD)</option>
            <option  value="LSL">Lesotho Loti (LSL)</option>
            <option  value="LTL">Lithuanian Litas (LTL)</option>
            <option  value="LVL">Latvian Lats (LVL)</option>
            <option  value="LYD">Libyan Dinar (LYD)</option>
            <option  value="MAD">Moroccan Dirham (MAD)</option>
            <option  value="MDL">Moldovan Leu (MDL)</option>
            <option  value="MGA">Malagasy Ariary (MGA)</option>
            <option  value="MKD">Macedonian Denar (MKD)</option>
            <option  value="MMK">Myanmar Kyat (MMK)</option>
            <option  value="MNT">Mongolian Tugrik (MNT)</option>
            <option  value="MOP">Macanese Pataca (MOP)</option>
            <option  value="MRO">Mauritanian Ouguiya (MRO)</option>
            <option  value="MUR">Mauritian Rupee (MUR)</option>
            <option  value="MVR">Maldivian Rufiyaa (MVR)</option>
            <option  value="MWK">Malawian Kwacha (MWK)</option>
            <option  value="MXN">Mexican Peso (MX$)</option>
            <option  value="MYR">Malaysian Ringgit (MYR)</option>
            <option  value="MZN">Mozambican Metical (MZN)</option>
            <option  value="NAD">Namibian Dollar (NAD)</option>
            <option  value="NGN">Nigerian Naira (NGN)</option>
            <option  value="NIO">Nicaraguan Córdoba (NIO)</option>
            <option  value="NOK">Norwegian Krone (NOK)</option>
            <option  value="NPR">Nepalese Rupee (NPR)</option>
            <option  value="NZD">New Zealand Dollar (NZ$)</option>
            <option  value="OMR">Omani Rial (OMR)</option>
            <option  value="PAB">Panamanian Balboa (PAB)</option>
            <option  value="PEN">Peruvian Nuevo Sol (PEN)</option>
            <option  value="PGK">Papua New Guinean Kina (PGK)</option>
            <option  value="PHP">Philippine Peso (Php)</option>
            <option  value="PKG">PKG (PKG)</option>
            <option  value="PKR">Pakistani Rupee (PKR)</option>
            <option  value="PLN">Polish Zloty (PLN)</option>
            <option  value="PYG">Paraguayan Guarani (PYG)</option>
            <option  value="QAR">Qatari Rial (QAR)</option>
            <option  value="RON">Romanian Leu (RON)</option>
            <option  value="RSD">Serbian Dinar (RSD)</option>
            <option  value="RUB">Russian Ruble (RUB)</option>
            <option  value="RWF">Rwandan Franc (RWF)</option>
            <option  value="SAR">Saudi Riyal (SAR)</option>
            <option  value="SBD">Solomon Islands Dollar (SBD)</option>
            <option  value="SCR">Seychellois Rupee (SCR)</option>
            <option  value="SDG">Sudanese Pound (SDG)</option>
            <option  value="SEK">Swedish Krona (SEK)</option>
            <option  value="SGD">Singapore Dollar (SGD)</option>
            <option  value="SHP">St. Helena Pound (SHP)</option>
            <option  value="SKK">Slovak Koruna (SKK)</option>
            <option  value="SLL">Sierra Leonean Leone (SLL)</option>
            <option  value="SOS">Somali Shilling (SOS)</option>
            <option  value="SRD">Surinamese Dollar (SRD)</option>
            <option  value="STD">São Tomé &amp; Príncipe Dobra (STD)</option>
            <option  value="SVC">Salvadoran Colón (SVC)</option>
            <option  value="SYP">Syrian Pound (SYP)</option>
            <option  value="SZL">Swazi Lilangeni (SZL)</option>
            <option  value="THB">Thai Baht (THB)</option>
            <option  value="TJS">Tajikistani Somoni (TJS)</option>
            <option  value="TMT">Turkmenistani Manat (TMT)</option>
            <option  value="TND">Tunisian Dinar (TND)</option>
            <option  value="TOP">Tongan Paʻanga (TOP)</option>
            <option  value="TRY">Turkish Lira (TRY)</option>
            <option  value="TTD">Trinidad &amp; Tobago Dollar (TTD)</option>
            <option  value="TWD">New Taiwan Dollar (NT$)</option>
            <option  value="TZS">Tanzanian Shilling (TZS)</option>
            <option  value="UAH">Ukrainian Hryvnia (UAH)</option>
            <option  value="UGX">Ugandan Shilling (UGX)</option>
            <option  value="USD">US Dollar ($)</option>
            <option  value="UYU">Uruguayan Peso (UYU)</option>
            <option  value="UZS">Uzbekistani Som (UZS)</option>
            <option  value="VEF">Venezuelan Bolívar (VEF)</option>
            <option  value="VND">Vietnamese Dong (₫)</option>
            <option  value="VUV">Vanuatu Vatu (VUV)</option>
            <option  value="WST">Samoan Tala (WST)</option>
            <option  value="XAF">Central African CFA Franc (FCFA)</option>
            <option  value="XCD">East Caribbean Dollar (EC$)</option>
            <option  value="XDR">Special Drawing Rights (XDR)</option>
            <option  value="XOF">West African CFA Franc (CFA)</option>
            <option  value="XPF">CFP Franc (CFPF)</option>
            <option  value="YER">Yemeni Rial (YER)</option>
            <option  value="ZAR">South African Rand (ZAR)</option>
            <option  value="ZMK">Zambian Kwacha (1968–2012) (ZMK)</option>
            <option  value="ZMW">Zambian Kwacha (ZMW)</option>
            <option  value="ZWL">Zimbabwean Dollar (2009) (ZWL)</option>
        </select>
        
        <label id = "currency2">Select Currency (To):</label>
        <select name="currency_to" id = "currencyselection2"; 
              border: solid 1px white">
              <option value="USD">US Dollar</option>
            <option value="EUR">Euro</option>
            <option value="INR">Indian Rupee</option>
            <option  value="AED">United Arab Emirates Dirham (AED)</option>
            <option  value="AFN">Afghan Afghani (AFN)</option>
            <option  value="ALL">Albanian Lek (ALL)</option>
            <option  value="AMD">Armenian Dram (AMD)</option>
            <option  value="ANG">Netherlands Antillean Guilder (ANG)</option>
            <option  value="AOA">Angolan Kwanza (AOA)</option>
            <option  value="ARS">Argentine Peso (ARS)</option>
            <option  value="AUD">Australian Dollar (A$)</option>
            <option  value="AWG">Aruban Florin (AWG)</option>
            <option  value="AZN">Azerbaijani Manat (AZN)</option>
            <option  value="BAM">Bosnia-Herzegovina Convertible Mark (BAM)</option>
            <option  value="BBD">Barbadian Dollar (BBD)</option>
            <option  value="BDT">Bangladeshi Taka (BDT)</option>
            <option  value="BGN">Bulgarian Lev (BGN)</option>
            <option  value="BHD">Bahraini Dinar (BHD)</option>
            <option  value="BIF">Burundian Franc (BIF)</option>
            <option  value="BMD">Bermudan Dollar (BMD)</option>
            <option  value="BND">Brunei Dollar (BND)</option>
            <option  value="BOB">Bolivian Boliviano (BOB)</option>
            <option  value="BRL">Brazilian Real (R$)</option>
            <option  value="BSD">Bahamian Dollar (BSD)</option>
            <option  value="BTC">Bitcoin (฿)</option>
            <option  value="BTN">Bhutanese Ngultrum (BTN)</option>
            <option  value="BWP">Botswanan Pula (BWP)</option>
            <option  value="BYR">Belarusian Ruble (BYR)</option>
            <option  value="BZD">Belize Dollar (BZD)</option>
            <option  value="CAD">Canadian Dollar (CA$)</option>
            <option  value="CDF">Congolese Franc (CDF)</option>
            <option  value="CHF">Swiss Franc (CHF)</option>
            <option  value="CLF">Chilean Unit of Account (UF) (CLF)</option>
            <option  value="CLP">Chilean Peso (CLP)</option>
            <option  value="CNH">CNH (CNH)</option>
            <option  value="CNY">Chinese Yuan (CN¥)</option>
            <option  value="COP">Colombian Peso (COP)</option>
            <option  value="CRC">Costa Rican Colón (CRC)</option>
            <option  value="CUP">Cuban Peso (CUP)</option>
            <option  value="CVE">Cape Verdean Escudo (CVE)</option>
            <option  value="CZK">Czech Republic Koruna (CZK)</option>
            <option  value="DEM">German Mark (DEM)</option>
            <option  value="DJF">Djiboutian Franc (DJF)</option>
            <option  value="DKK">Danish Krone (DKK)</option>
            <option  value="DOP">Dominican Peso (DOP)</option>
            <option  value="DZD">Algerian Dinar (DZD)</option>
            <option  value="EGP">Egyptian Pound (EGP)</option>
            <option  value="ERN">Eritrean Nakfa (ERN)</option>
            <option  value="ETB">Ethiopian Birr (ETB)</option>
            <option  value="EUR">Euro (€)</option>
            <option  value="FIM">Finnish Markka (FIM)</option>
            <option  value="FJD">Fijian Dollar (FJD)</option>
            <option  value="FKP">Falkland Islands Pound (FKP)</option>
            <option  value="FRF">French Franc (FRF)</option>
            <option  value="GBP">British Pound (£)</option>
            <option  value="GEL">Georgian Lari (GEL)</option>
            <option  value="GHS">Ghanaian Cedi (GHS)</option>
            <option  value="GIP">Gibraltar Pound (GIP)</option>
            <option  value="GMD">Gambian Dalasi (GMD)</option>
            <option  value="GNF">Guinean Franc (GNF)</option>
            <option  value="GTQ">Guatemalan Quetzal (GTQ)</option>
            <option  value="GYD">Guyanaese Dollar (GYD)</option>
            <option  value="HKD">Hong Kong Dollar (HK$)</option>
            <option  value="HNL">Honduran Lempira (HNL)</option>
            <option  value="HRK">Croatian Kuna (HRK)</option>
            <option  value="HTG">Haitian Gourde (HTG)</option>
            <option  value="HUF">Hungarian Forint (HUF)</option>
            <option  value="IDR">Indonesian Rupiah (IDR)</option>
            <option  value="IEP">Irish Pound (IEP)</option>
            <option  value="ILS">Israeli New Sheqel (₪)</option>
            <option  value="INR">Indian Rupee (Rs.)</option>
            <option  value="IQD">Iraqi Dinar (IQD)</option>
            <option  value="IRR">Iranian Rial (IRR)</option>
            <option  value="ISK">Icelandic Króna (ISK)</option>
            <option  value="ITL">Italian Lira (ITL)</option>
            <option  value="JMD">Jamaican Dollar (JMD)</option>
            <option  value="JOD">Jordanian Dinar (JOD)</option>
            <option  value="JPY">Japanese Yen (¥)</option>
            <option  value="KES">Kenyan Shilling (KES)</option>
            <option  value="KGS">Kyrgystani Som (KGS)</option>
            <option  value="KHR">Cambodian Riel (KHR)</option>
            <option  value="KMF">Comorian Franc (KMF)</option>
            <option  value="KPW">North Korean Won (KPW)</option>
            <option  value="KRW">South Korean Won (₩)</option>
            <option  value="KWD">Kuwaiti Dinar (KWD)</option>
            <option  value="KYD">Cayman Islands Dollar (KYD)</option>
            <option  value="KZT">Kazakhstani Tenge (KZT)</option>
            <option  value="LAK">Laotian Kip (LAK)</option>
            <option  value="LBP">Lebanese Pound (LBP)</option>
            <option  value="LKR">Sri Lankan Rupee (LKR)</option>
            <option  value="LRD">Liberian Dollar (LRD)</option>
            <option  value="LSL">Lesotho Loti (LSL)</option>
            <option  value="LTL">Lithuanian Litas (LTL)</option>
            <option  value="LVL">Latvian Lats (LVL)</option>
            <option  value="LYD">Libyan Dinar (LYD)</option>
            <option  value="MAD">Moroccan Dirham (MAD)</option>
            <option  value="MDL">Moldovan Leu (MDL)</option>
            <option  value="MGA">Malagasy Ariary (MGA)</option>
            <option  value="MKD">Macedonian Denar (MKD)</option>
            <option  value="MMK">Myanmar Kyat (MMK)</option>
            <option  value="MNT">Mongolian Tugrik (MNT)</option>
            <option  value="MOP">Macanese Pataca (MOP)</option>
            <option  value="MRO">Mauritanian Ouguiya (MRO)</option>
            <option  value="MUR">Mauritian Rupee (MUR)</option>
            <option  value="MVR">Maldivian Rufiyaa (MVR)</option>
            <option  value="MWK">Malawian Kwacha (MWK)</option>
            <option  value="MXN">Mexican Peso (MX$)</option>
            <option  value="MYR">Malaysian Ringgit (MYR)</option>
            <option  value="MZN">Mozambican Metical (MZN)</option>
            <option  value="NAD">Namibian Dollar (NAD)</option>
            <option  value="NGN">Nigerian Naira (NGN)</option>
            <option  value="NIO">Nicaraguan Córdoba (NIO)</option>
            <option  value="NOK">Norwegian Krone (NOK)</option>
            <option  value="NPR">Nepalese Rupee (NPR)</option>
            <option  value="NZD">New Zealand Dollar (NZ$)</option>
            <option  value="OMR">Omani Rial (OMR)</option>
            <option  value="PAB">Panamanian Balboa (PAB)</option>
            <option  value="PEN">Peruvian Nuevo Sol (PEN)</option>
            <option  value="PGK">Papua New Guinean Kina (PGK)</option>
            <option  value="PHP">Philippine Peso (Php)</option>
            <option  value="PKG">PKG (PKG)</option>
            <option  value="PKR">Pakistani Rupee (PKR)</option>
            <option  value="PLN">Polish Zloty (PLN)</option>
            <option  value="PYG">Paraguayan Guarani (PYG)</option>
            <option  value="QAR">Qatari Rial (QAR)</option>
            <option  value="RON">Romanian Leu (RON)</option>
            <option  value="RSD">Serbian Dinar (RSD)</option>
            <option  value="RUB">Russian Ruble (RUB)</option>
            <option  value="RWF">Rwandan Franc (RWF)</option>
            <option  value="SAR">Saudi Riyal (SAR)</option>
            <option  value="SBD">Solomon Islands Dollar (SBD)</option>
            <option  value="SCR">Seychellois Rupee (SCR)</option>
            <option  value="SDG">Sudanese Pound (SDG)</option>
            <option  value="SEK">Swedish Krona (SEK)</option>
            <option  value="SGD">Singapore Dollar (SGD)</option>
            <option  value="SHP">St. Helena Pound (SHP)</option>
            <option  value="SKK">Slovak Koruna (SKK)</option>
            <option  value="SLL">Sierra Leonean Leone (SLL)</option>
            <option  value="SOS">Somali Shilling (SOS)</option>
            <option  value="SRD">Surinamese Dollar (SRD)</option>
            <option  value="STD">São Tomé &amp; Príncipe Dobra (STD)</option>
            <option  value="SVC">Salvadoran Colón (SVC)</option>
            <option  value="SYP">Syrian Pound (SYP)</option>
            <option  value="SZL">Swazi Lilangeni (SZL)</option>
            <option  value="THB">Thai Baht (THB)</option>
            <option  value="TJS">Tajikistani Somoni (TJS)</option>
            <option  value="TMT">Turkmenistani Manat (TMT)</option>
            <option  value="TND">Tunisian Dinar (TND)</option>
            <option  value="TOP">Tongan Paʻanga (TOP)</option>
            <option  value="TRY">Turkish Lira (TRY)</option>
            <option  value="TTD">Trinidad &amp; Tobago Dollar (TTD)</option>
            <option  value="TWD">New Taiwan Dollar (NT$)</option>
            <option  value="TZS">Tanzanian Shilling (TZS)</option>
            <option  value="UAH">Ukrainian Hryvnia (UAH)</option>
            <option  value="UGX">Ugandan Shilling (UGX)</option>
            <option  value="USD">US Dollar ($)</option>
            <option  value="UYU">Uruguayan Peso (UYU)</option>
            <option  value="UZS">Uzbekistani Som (UZS)</option>
            <option  value="VEF">Venezuelan Bolívar (VEF)</option>
            <option  value="VND">Vietnamese Dong (₫)</option>
            <option  value="VUV">Vanuatu Vatu (VUV)</option>
            <option  value="WST">Samoan Tala (WST)</option>
            <option  value="XAF">Central African CFA Franc (FCFA)</option>
            <option  value="XCD">East Caribbean Dollar (EC$)</option>
            <option  value="XDR">Special Drawing Rights (XDR)</option>
            <option  value="XOF">West African CFA Franc (CFA)</option>
            <option  value="XPF">CFP Franc (CFPF)</option>
            <option  value="YER">Yemeni Rial (YER)</option>
            <option  value="ZAR">South African Rand (ZAR)</option>
            <option  value="ZMK">Zambian Kwacha (1968–2012) (ZMK)</option>
            <option  value="ZMW">Zambian Kwacha (ZMW)</option>
            <option  value="ZWL">Zimbabwean Dollar (2009) (ZWL)</option>
        </select>
        <br>
        <br>
		<input type="submit" id= calculate value="Calculate" />
        <br>
        <br>
        <p>$currency_input $currency_from is equal to $currency $currency_to</p>
	</form>
	</body>
</html>
_END;
?>
        </section>
        


   
   <!-- TEAM
	============================================= -->
    
    <!--
     <section id="team">
        <div class="container">
            <h2>Developer and Designer</h2>
            <hr class="sep">
            <p></p>
            <div class="row wow fadeInUp" data-wow-delay=".3s">
                <div class="col-md-4">
                    
                </div>
                <div class="col-md-4">
                    <div class="team">
                        <img class="img-responsive center-block" src="myimg/profile/profile.png" alt="2">
                        <h4>Salomon Yanez</h4>
                        <p>Developer and Designer</p>
                        <div class="team-social-icons">
                            <a href="https://voodooraptor.blogspot.com/"><img class="img-responsive center-block" src="myimg/blogger/bloggericon.png" alt="1"></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    -->
    <!-- Footer
	============================================= -->
    <footer>
        <section id="Credit">
        <div class="container">
            <h1>Credit</h1>
            <p id = "footertext"> If you're interested in the template I used it was <a href="https://shapebootstrap.net/item/1525198-rise-multipurpose-html5-template" >RISE</a>.
            </p>
            <br>
            
            <h6>Salomon Yanez - Florida Atlantic University</h6>
        </div>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-assets/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- JS PLUGINS -->
    <script src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="plugins/countTo/jquery.countTo.js"></script>
    <script src="plugins/inview/jquery.inview.min.js"></script>
    <script src="plugins/Lightbox/dist/js/lightbox.min.js"></script>
    <script src="plugins/WOW/dist/wow.min.js"></script>
    <!-- GOOGLE MAP -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
</body>

</html>