<?php


class Transport{
    // класс Транспортировка через выбранную компанию
    public  $distance;
    public  $speed;
    public  $pricePerKilometer;
    public  $name;

    public function __construct($transportCompany){
        $arrCompanies = require ($_SERVER['DOCUMENT_ROOT'] . "/transportCompanies.php");  // как бы база компаний
        try {
            $this->name = $transportCompany;
            $this->speed = $arrCompanies[$transportCompany]['speed'];
            $this->pricePerKilometer = $arrCompanies[$transportCompany]['pricePerKilometer'];
            $this->weightCoeff = $arrCompanies[$transportCompany]['weightCoeff'];
            $this->distance = 0;
        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

    public function getFastPackage($parcel)
    {
        //подсчёт доставки
        $this->distance = $this->getDistance($parcel->sourceKladr, $parcel->targetKladr);
        $weightCoeff = $parcel->weight * $this->weightCoeff;

        $result_array = array();
        $result_array['price'] = round($this->pricePerKilometer * $this->distance * $weightCoeff);
        $result_array['period'] = round($this->distance / $this->speed);
        $result_array['date'] = date('d-m-Y', (time() + ($result_array['period'] * 24 * 60 * 60)));
        $result_array['error'] = "ok";

        return $result_array;
    }

    public function getDistance($start, $end)
    {
        $result = 1000;
        return $result;
    }


}