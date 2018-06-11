
function ajaxGet(url, callback) {

var req = new XMLHttpRequest();

req.open("GET", url);

req.addEventListener("load", function () {

    if (req.status >= 200 && req.status < 400) {

        // Appelle la fonction callback en lui passant la réponse de la requête

        callback(req.responseText);

    } else {

        console.error(req.status + " " + req.statusText + " " + url);

    }

});

req.addEventListener("error", function () {

    console.error("Erreur réseau avec l'URL " + url);

});

req.send(null);

}
// Accès à la météo de Lyon avec la clé d'accès 50a65432f17cf542

// var reponse = new XMLHttpRequest();
// reponse.open('GET', "https://opendata.hauts-de-seine.fr/api/records/1.0/search/?dataset=archives-de-la-planete&sort=identifiant_fakir&facet=operateur&facet=themes&facet=lieu_retraite", false);
// reponse.send(null);
// var data = JSON.parse(reponse.responseText);
// console.log(data);
function oeuvres () {
ajaxGet("https://opendata.hauts-de-seine.fr/api/records/1.0/search/?dataset=archives-de-la-planete&sort=identifiant_fakir&facet=operateur&facet=themes&facet=lieu_retraite", function (reponse) {

    var oeuvre = JSON.parse(reponse);
    var min = 0;
    var max = 10;
    var index = Math.floor(Math.random() * 1); 
    console.log(index);    
    // Récupération de certains résultats
    var legende = oeuvre.records[index].fields.legende_revisee;
    var date = oeuvre.records[index].fields.date_de_prise_de_vue;
    var technique = oeuvre.records[index].fields.procede_technique;
    // var date = oeuvre.records;
    // Affichage des résultats
    // var conditionsElt = document.createElement("div");
    // conditionsElt.textContent = "Titre :" + oeuvre +
    //     "date :" + date;
    // var oeuvreElt = document.getElementById("oeuvre");
    // oeuvreElt.appendChild(conditionsElt);
    // console.log(oeuvres);
    var para = document.createElement("P");                       // Create a <p> element
    var t = document.createTextNode(legende);      // Create a text node
    para.appendChild(t);                                          // Append the text to <p>
    document.getElementById("mon_oeuvre").appendChild(para);           // Append <p> to <div> with id="myDIV" 

    var para1 = document.createElement("P");                       // Create a <p> element
    var t1 = document.createTextNode(date);      // Create a text node
    para1.appendChild(t1);                                          // Append the text to <p>
    document.getElementById("mon_oeuvre").appendChild(para1);           // Append <p> to <div> with id="myDIV" 

    var para2 = document.createElement("P");                       // Create a <p> element
    var t2 = document.createTextNode(technique);      // Create a text node
    para2.appendChild(t2);                                          // Append the text to <p>
    document.getElementById("mon_oeuvre").appendChild(para2);           // Append <p> to <div> with id="myDIV" 

    //document.getElementById("oeuvre").innerHTML = technique;
});

}
