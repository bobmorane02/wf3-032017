document.getElementById("connexion").addEventListener("click",function(){
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("modale").innerHTML = xhttp.responseText;
            document.getElementById("modale").style.display = "block";
            document.getElementById("form_cnx").addEventListener("submit",function(e){
                e.preventDefault();
                var pseudo = document.getElementById('pseudo').value;
                var mdp = document.getElementById('mdp').value;
                var parametres='pseudo='+pseudo+'&mdp='+mdp;
                xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (xhttp.readyState == 4 && xhttp.status == 200) {
                        var rep = JSON.parse(xhttp.responseText);
                        document.getElementById("message").innerHTML = rep.resultat;
                    }
                }
                xhttp.open("POST","connexion.php",true);
                xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                xhttp.send(parametres);
            },false);
            document.getElementById("pseudo").addEventListener("focus",function(e){
                e.preventDefault();
                document.getElementById("message").innerHTML = '';
            },false);
            document.getElementById("mdp").addEventListener("focus",function(e){
                e.preventDefault();
                document.getElementById("message").innerHTML = '';
            },false);                    
        }
    }
    xhttp.open("GET","menu_connexion.php",true);
    xhttp.send();
},false);

