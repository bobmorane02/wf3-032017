document.getElementById("connexion").addEventListener("click",function(){
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("modale").innerHTML = xhttp.responseText;
            document.getElementById("modale").style.display = "block";         
        }
    }
    xhttp.open("GET","menu_connexion.php",true);
    xhttp.send();
},false);

document.getElementById("form_cnx").addEventListener("submit",function(e){
    e.preventDefault();
    var $pseudo = getElementById('pseudo').value;
    var $mdp = getElementById('mdp').value;
    var parametres='pseudo='+$pseudo+'&mdp='+$mdp;

    xhttp = new XMLHttpRequest();
    xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            var $rep = JSON.parse(xhttp.responseText);
            document.getElementById("message").innerHTML = $rep.message;
        }
    }
    xhttp.open("POST","connexion.php",true);

    xhttp.send(parametres);

},false);
