window.addEventListener("load", ini, false);
var selected = false;
function ini() {
    document.getElementById('start').addEventListener("click", getIniJson);
    document.getElementById('image').addEventListener("mouseover", getPistaJson);
    document.getElementById('obtencolor').addEventListener("mouseover", color);
    document.getElementById('image').addEventListener("mouseleave", getRespuestasJson);
}
function color() {
    var xmlHttp = new XMLHttpRequest();

        urlDestino = "color.php";
        xmlHttp.open("GET", urlDestino, true);

        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState == 4) {
                var a=JSON.parse(xmlHttp.response);
                var node = document.createElement("div");
                node.innerHTML=a.color;
                var midiv=document.getElementById('putco').appendChild(node);
               
                
            }
        };
        xmlHttp.send(null);
}

function getIniJson() {
    // document.getElementById("image").innerHTML = "";
    if (!selected) {

        var xmlHttp = new XMLHttpRequest();

        urlDestino = "serv.php?inicio=si";
        xmlHttp.open("GET", urlDestino, true);

        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState == 4) {
                //funcion a ejecutar al recibir la respuesta
                repRespostaJSON(xmlHttp);
                //alert("xmlHttp");
            }
        };
        xmlHttp.send(null);

    }
}

function getPistaJson() {
    var xmlHttp = new XMLHttpRequest();

    urlDestino = "serv.php?pista=si";
    xmlHttp.open("GET", urlDestino, true);

    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            //funcion a ejecutar al recibir la respuesta
            showPistaJson(xmlHttp);
        }
    };
    xmlHttp.send(null);

}

function getRespuestasJson() {
    var xmlHttp = new XMLHttpRequest();

    urlDestino = "serv.php?respuestas=si";
    xmlHttp.open("GET", urlDestino, true);

    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xmlHttp.onreadystatechange = function () {
        if (xmlHttp.readyState == 4) {
            //funcion a ejecutar al recibir la respuesta
            showRespuestasJson(xmlHttp);
            //alert("xmlHttp");
        }
    };
    xmlHttp.send(null);

}

function repRespostaJSON(xmlHttp) {

    if (xmlHttp.status == 200) {
        var resp = xmlHttp.responseText;
        var respJSON = JSON.parse(resp);
        var txt = respJSON.ruta;
        //NUM = TXT
        var img = "<img src='" + txt + "'/>";
        document.getElementById("image").innerHTML = img;


    }

}


function showRespuestasJson(xmlHttp) {

    if (xmlHttp.status == 200) {
        document.getElementById("image").innerHTML = "";
        var resp = xmlHttp.responseText;
        var respJSON = JSON.parse(resp);
        var txt = respJSON.good;
        var goodAns = document.createElement('DIV');
        var badAns = document.createElement('DIV');
        goodAns.innerHTML = '<button  type="button" class="btn btn-block btn-info">' + respJSON.good;
        +"</button>";
        badAns.innerHTML = '<button  type="button" class="btn btn-block btn-info">' + respJSON.bad;
        +"</button>";
        document.getElementById('question').appendChild(goodAns);
        document.getElementById('question').appendChild(badAns);

        goodAns.addEventListener("click", selectGoodAns, false);
        badAns.addEventListener("click", selectBadAns, false);


    }

}

function selectGoodAns(event) {
    if (!selected) {


        console.log(event.target);
        event.target.className = 'btn btn-block btn-success';
    }
    selected = true;

    setTimeout(function () {
        location.href = "indexJs.php";
    }, 3000);

}

function selectBadAns(event) {
    if (!selected) {

        event.target.className = 'btn btn-block btn-danger';
    }
    selected = true;
    setTimeout(function () {
        location.href = "indexJs.php";
    }, 3000);
}

function showPistaJson(xmlHttp) {

    if (xmlHttp.status == 200) {
        var resp = xmlHttp.responseText;
        var respJSON = JSON.parse(resp);
        var txt = respJSON.pista;
        //NUM = TXT
        var p = "<h3>" + txt + "</h3>";
        document.getElementById("clue").innerHTML = p;


    }

}