//creo un oggetto XMLHttpRequest

var richiesta = new XMLHttpRequest(); //<--- serve per leggere un file esterno (in questo caso il Json prodotti)
//qua definisco cosa fare quando la risposta arriva
richiesta.onreadystatechange = function() {

    //readyState 4 = operazione completata
    //status 200 = tutto OK
    if(richiesta.readyState == 4 && richiesta.status == 200){
        //converto il testo JSON in oggetti JS utilizzabili
        var prodotti = JSON.parse(richiesta.responseText);
        //prendiamo il div(contenitore nell' index) dove stampare i dati
        var contenuto = document.getElementById("contenuto");

        //Ciclo tutti i prodotti scorrendoli 1 alla volta
        prodotti.forEach(function (prodotto) { 

 

            contenuto.innerHTML +=
                "<div>" +
                "<h3>" + prodotto.nome + "</h3>" +
                "<p>CPU: " + prodotto.marca + "</p>" +
                "<p>RAM: " + prodotto.taglia + "</p>" +
                "<p>Prezzo: €" + prodotto.prezzo + "</p>" +
                "<hr>" +
                "</div>";
            // IinnerHTML scrive html dinamico nella pagina
    
        }); 
    }
};
// Apro la richiesta verso il file JSON
richiesta.open("GET", "prodotti.json", true);
// Invo la richiesta
richiesta.send();
