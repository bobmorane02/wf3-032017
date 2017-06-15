<?php

set_time_limit(0);

$db = new PDO('mysql:host=localhost;dbname=temp','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$geocoder = "http://maps.googleapis.com/maps/api/geocode/json?address=%s&sensor=false";

$rep = $db->query("SELECT * FROM ville WHERE id_ville BETWEEN 8501 AND 8510");
#$rep = $db->query("SELECT * FROM ville WHERE code_postal LIKE '80%'");

while ($reponse = $rep->fetch(PDO::FETCH_ASSOC)){
    if (!$reponse['longitude'] || !$reponse['latitude'] || !$reponse['departement']){
        $address = $reponse['code_postal'].' '.$reponse['nom_ville'];
        $url_address = urlencode($address);
        $query = sprintf($geocoder,$url_address);
        $results = file_get_contents($query);
        $resultat = json_decode($results);
        $coord = $resultat->results[0]->geometry->location;
        for ($i=0;$i < sizeof($resultat->results[0]->address_components);$i++) {
            if($resultat->results[0]->address_components[$i]->types[0] == 'administrative_area_level_2'){
                $departement = $resultat->results[0]->address_components[$i]->long_name;
                break;
            }
        }
        $maj = $db->query('UPDATE ville SET longitude = '.$coord->lng.',latitude = '.$coord->lat.', departement = "'.$departement.'" WHERE id_ville = '.$reponse['id_ville']);
    }
}
/*$a = $rep->fetchAll(PDO::FETCH_ASSOC);
echo '<pre>';print_r($a);echo '</pre>';*/
echo "FINI !!!";
