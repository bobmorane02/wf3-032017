/*

function ajouterEvent (element) {
    document.getElementById(element).addEventListener("click",function(){
        ele = document.getElementsByTagName('main')[0];
        ele.removeChild(ele.firstChild);
        ele = ele.firstChild;
        xhttp = new XMLHttpRequest();
        if (xhttp.readyState == 4 && xhttp.status == 200) {
        }
    });
}

if (document.getElementById("connexion")) { init(); } else { deconnexion(); };*/

function deconnexion () {
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var rep = JSON.parse(xhttp.responseText);
            if (!rep.erreur){
                var props="";
                for (prop in rep.resultat){ props+= '<li id="'+rep.resultat[prop].toLowerCase()+'">'+rep.resultat[prop]+'</li>'; }
                document.getElementById("menu").innerHTML = '';
                document.getElementById("menu").innerHTML = props;
                init();
            }    
        }
    }
    xhttp.open("POST","connexion.php",true);
    xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhttp.send("mode=deconnexion");
}

function init() {
    if (document.getElementById('connexion')){
        document.getElementById('connexion').addEventListener("click",function(){
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("modale").innerHTML = xhttp.responseText;
                    document.getElementById("modale").classList.remove('hidden');
                    document.getElementById("form_cnx").addEventListener("submit",function(e){
                        e.preventDefault();
                        var pseudo = document.getElementById('pseudo').value;
                        var mdp = document.getElementById('mdp').value;
                        var parametres='pseudo='+pseudo+'&mdp='+mdp+'&mode=';
                        xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (xhttp.readyState == 4 && xhttp.status == 200) {
                                var rep = JSON.parse(xhttp.responseText);
                                if (!rep.erreur) {
                                    var props="";                                
                                    for (prop in rep.resultat){ props+= '<li id="'+rep.resultat[prop].toLowerCase()+'">'+rep.resultat[prop]+'</li>'; }
                                        document.getElementById("menu").innerHTML = '';
                                        document.getElementById("menu").innerHTML = props;
                                        document.getElementById("modale").classList.add('hidden');
                                        document.getElementById("modale").innerHTML = '';
                                        document.getElementById("deconnexion").addEventListener("click",function(){
                                            deconnexion();
                                        });
                                        if (document.getElementById("gestion des salles")) { ajouterEvent ('gestion des salles'); }
                                } else {
                                document.getElementById("message").innerHTML = rep.resultat;  
                                }
                            }
                        }
                        xhttp.open("POST","connexion.php",true);
                        xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                        xhttp.send(parametres+"connexion");
                    },false);             
                }
            }
            xhttp.open("GET","menu_connexion.php",true);
            xhttp.send();           
        },false);
    }

    if (document.getElementById('inscription')){
        document.getElementById("inscription").addEventListener("click",function(){
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                    document.getElementById("modale").innerHTML = xhttp.responseText;
                    document.getElementById("modale").style.display = "block";
                    document.getElementById("form_ins").addEventListener("submit",function(e){
                        e.preventDefault();
                        var pseudo = document.getElementById('pseudo').value;
                        var mdp = document.getElementById('mdp').value;
                        var nom = document.getElementById('nom').value;
                        var prenom = document.getElementById('prenom').value;
                        var email = document.getElementById('email').value;
                        var civilite = document.getElementById('civilite').value;
                        var parametres='pseudo='+pseudo+'&mdp='+mdp+'&nom='+nom+'&prenom='+prenom+'&email='+email+'&civilite='+civilite+'&mode=';
                        xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (xhttp.readyState == 4 && xhttp.status == 200) {
                                var rep = JSON.parse(xhttp.responseText);
                                if (!rep.erreur) {
                                    var props="";
                                    for (prop in rep.resultat){ props+= '<li id="'+rep.resultat[prop].toLowerCase()+'">'+rep.resultat[prop]+'</li>'; }
                                        document.getElementById("menu").innerHTML = '';
                                        document.getElementById("menu").innerHTML = props;
                                        document.getElementById("modale").classList.add('hidden');
                                        document.getElementById("modale").innerHTML = '';
                                        document.getElementById("deconnexion").addEventListener("click",function(){
                                            deconnexion();
                                        });
                                } else {
                                document.getElementById("message").innerHTML = rep.resultat;  
                                }
                            }
                        }
                        xhttp.open("POST","connexion.php",true);
                        xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                        xhttp.send(parametres+"inscription");
                    },false);
                }
            }
            xhttp.open("GET","menu_inscription.php",true);
            xhttp.send();        
        },false);    
    }
}

if (document.getElementById("connexion")) { init(); }