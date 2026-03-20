<?php
// Inizio script PHP

echo "do_action raggiunto"; 
// Stampa un messaggio per debug: serve per verificare se il file viene eseguito

// NON arriva qua! chiedi aiuto al prof

exit;
// Termina immediatamente lo script
// ⚠️ Tutto il codice sotto NON verrà mai eseguito finché questo exit è presente

$wsdl = "https://coni20044.github.io/LavoriTps/SOAP/converter.wsdl";
// URL del file WSDL che descrive il servizio SOAP

if (!empty($_POST['value']) && !empty($_POST['operation'])) {
    // Controlla che siano stati inviati i dati dal form:
    // - value = numero da convertire
    // - operation = tipo di conversione

    $client = new SoapClient($wsdl, [
        "location" => "https://coni20044.github.io/LavoriTps/SOAP/server.php"
    ]);
    // Crea un client SOAP
    // - usa il WSDL per capire le operazioni disponibili
    // - location sovrascrive l'endpoint (URL del server SOAP)

    $value = floatval($_POST['value']);
    // Converte il valore ricevuto in numero decimale (float)

    if ($_POST['operation'] == "m2i") {
        // Se l’operazione richiesta è metri → pollici

        $result = $client->metersToInches($value);
        // Chiama il metodo SOAP definito nel WSDL

        echo "$value metri = $result pollici";
        // Stampa il risultato
    }

    if ($_POST['operation'] == "i2m") {
        // Se l’operazione richiesta è pollici → metri

        $result = $client->inchesToMeters($value);
        // Chiama il metodo SOAP corrispondente

        echo "$value pollici = $result metri";
        // Stampa il risultato
    }
}

?>
// Fine script PHP
