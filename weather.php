<?php
$data = file_get_contents('https://api.meteo-concept.com/api/location/city?token=1aa951703654f0d403481598d54a7c249fd1a64c0bbf0de3b0ca3f6e6fd83893');

if ($data !== false) {
    $city = json_decode($data)->city;
    print("La ville de {$city->name} ({$city->cp}) a pour coordonnées {$city->latitude},{$city->longitude}.");
} else {
    print("Erreur : Impossible de récupérer les données.");
}
?>
