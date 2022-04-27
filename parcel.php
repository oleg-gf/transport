<?php

class Parcel{
    // класс Посылка
    public  $sourceKladr;
    public  $targetKladr;
    public  $weight;

    public function __construct($options_array){
        
        try {
            $this->sourceKladr = $options_array['sourceKladr'];      // место отправления
            $this->targetKladr = $options_array['targetKladr'];     // место получения
            $this->weight = $options_array['weight'];               //вес


        } catch (Exception $e) {
            echo $e->getMessage();
        }
   

    }
}