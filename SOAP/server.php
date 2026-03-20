<?php

function metersToInches($meters) {
    return $meters * 39.3701;
}

function inchesToMeters($inches) {
    return $inches / 39.3701;
}
$server = new SoapServer("converter.wsdl");
// Crea un server SOAP
// - usa il file WSDL per sapere quali funzioni esporre
// - il WSDL definisce operazioni, parametri e struttura

$server->addFunction("metersToInches");
// Registra la funzione PHP metersToInches()
// → diventa accessibile come operazione SOAP

$server->addFunction("inchesToMeters");
// Registra la funzione PHP inchesToMeters()
// → anche questa sarà chiamabile dai client SOAP

$server->handle();
// Avvia il server SOAP:
// - riceve la richiesta HTTP
// - interpreta il messaggio SOAP
// - chiama la funzione corretta
// - restituisce la risposta al client

?>

