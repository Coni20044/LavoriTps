<?php

function metersToInches($meters) {
    return $meters * 39.3701;
}

function inchesToMeters($inches) {
    return $inches / 39.3701;
}

$server = new SoapServer("converter.wsdl");
$server->addFunction("metersToInches");
$server->addFunction("inchesToMeters");
$server->handle();

?>
