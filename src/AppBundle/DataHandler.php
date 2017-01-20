<?php
/**
 * Created by PhpStorm.
 * User: pgp
 * Date: 1/20/17
 * Time: 6:48 AM
 */

namespace AppBundle;


class DataHandler
{

    private $raw_replies = array();


    /**
     * @var array data with the format
     *  Array([currency]=>
     *      Array([Date]=>Rate))
     */
    private $data = array();

    private $CURRENCIES_TO_ANALYSE = array('CHF', 'GBP', 'JPY', 'USD');

    public function importData($d){
        $this->raw_replies[] = $d;
        $decoded_data = json_decode($d);
        $my_date = $this->getDateFromData($decoded_data);
        $rates = (array)($decoded_data->{'rates'});

        foreach ( $rates as $currency => $rate){
            if( in_array($currency, $this->CURRENCIES_TO_ANALYSE)){
                $this->data[$currency][$my_date] = $rate;
            }
        }
//        print_r($this->data);
//        print_r("<br>");

    }

    // making it private because is only deals with decodeed data
    private function getDateFromData($d){
        return $d->{'date'};
    }

    public function getData(){
        return $this->data;
    }

    public function getDates(){
        return array_keys($this->data['CHF']);
    }


    public function getStats(){
        $res = Array();
        foreach ( $this->data as $cur => $rates){
            $sum = 0;
            $min = 1000000;
            $max = -1;
            $n = 0;
            foreach ( $rates as $rate ){
                $sum += $rate;
                $min = ($min < $rate) ? $min : $rate;
                $max = ($max > $rate) ? $max : $rate;
                $n ++;
            }

            $res[$cur] = Array( 'min' => $min, 'max' => $max, 'avg' =>$sum/$n );
        }
        return $res;

    }


}