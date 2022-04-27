<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/errors.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . "/parcel.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/transport.php");

foreach ($_POST as &$value) {
    $value = trim(htmlspecialchars($value));
}


$transportCompany = $_POST["transportCompany"];

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
        $result_array = $transport->getPackage($parsel);
        
    } catch (Exception $e) {
        $result_array['error'] = $e->getMessage();
    }
   
    return $result_array;
}

