<?php
/**
 * Created by PhpStorm.
 * User: pgp
 * Date: 1/19/17
 * Time: 5:02 PM
 */

namespace AppBundle\Services;


class GetForexData
{

    public function fetchDayData( $date ) {
        ini_set("allow_url_fopen", 1);

        $baseURL = 'http://api.fixer.io/' . $date;
        $json = file_get_contents($baseURL);
        return $json;
    }

    public function fetchData(){
        // Start date is yesterday, as it is no guaranteed today's rates are available
        $start_date =  date('Y-m-d', strtotime('-1 day'));
        $dates_to_get = $this->getDates($start_date);

        $res = array();
        foreach ( $dates_to_get as $d){
            $res[$d] = $this->fetchDayData($d);
            //print_r($res);
        }
        //print_r($res);
        return $res;
    }

    public function getDates($startDate){
        $dates = array();
        $n_dates = 0;
        $MAX_DATES = 5;
        $cur_date = $startDate;
        while( $n_dates < $MAX_DATES) {
            if(!$this->isWeekend($cur_date)){
                $dates[] = $cur_date;
                $n_dates++;
            }
            $cur_date = date('Y-m-d', strtotime('-1 day', strtotime($cur_date)));
        }
//        print_r($dates);
        return $dates;
    }

    public function isWeekend($date){
        return (date('N', strtotime($date)) >= 6);
    }
}