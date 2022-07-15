<?php

namespace transport;

use Parcel;
use Transport;

session_start();
spl_autoload_register();



foreach ($_POST as &$value) {
    $value = trim(htmlspecialchars($value));
}


$transportCompany = $_POST["transportCompany"];
$speed = $_POST["speed"];
$parselOptions = [
    'sourceKladr' => $_POST["inputCity"],
    'targetKladr' => $_POST["outputCity"],
    'weight' => $_POST["weight"],
];

$transport = new Transport($transportCompany);
$parsel = new Parcel($parselOptions);


$result_array = package($parsel, $transport);
$result_array['transportCompany'] = $transportCompany;

exit (json_encode($result_array));

function package($parsel, $transport){
    try {
        $result_array = $transport->getFastPackage($parsel);
        
    } catch (Exception $e) {
        $result_array['error'] = $e->getMessage();
    }
   
    return $result_array;
}

