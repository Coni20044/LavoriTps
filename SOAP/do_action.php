<?php

$wsdl = "http://TUO_SITO/soap/converter.wsdl";

if (!empty($_POST['value']) && !empty($_POST['operation'])) {

    $client = new SoapClient($wsdl, [
        "location" => "https://coni20044.github.io/LavoriTps/SOAP/server.php"
    ]);

    $value = floatval($_POST['value']);

    if ($_POST['operation'] == "m2i") {
        $result = $client->metersToInches($value);
        echo "$value metri = $result pollici";
    }

    if ($_POST['operation'] == "i2m") {
        $result = $client->inchesToMeters($value);
        echo "$value pollici = $result metri";
    }
}

?>
