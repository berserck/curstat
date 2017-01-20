<?php
/**
 * Created by PhpStorm.
 * User: pgp
 * Date: 1/19/17
 * Time: 11:56 AM
 */

namespace AppBundle\Controller;


use AppBundle\Services\GetForexData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ShowDataController extends Controller
{
    /**
     * @Route("/showData", name="show_raw_data")
     */
    public function showData(){

//        $data = "{\"base\":\"EUR\",\"date\":\"2017-01-13\",\"rates\":{\"AUD\":1.4225,\"BGN\":1.9558,\"BRL\":3.4097,\"CAD\":1.401,\"CHF\":1.0728,\"CNY\":7.3564,\"CZK\":27.021,\"DKK\":7.435,\"GBP\":0.87548,\"HKD\":8.2672,\"HRK\":7.527,\"HUF\":307.5,\"IDR\":14213.0,\"ILS\":4.0671,\"INR\":72.668,\"JPY\":121.91,\"KRW\":1251.4,\"MXN\":23.086,\"MYR\":4.7569,\"NOK\":9.058,\"NZD\":1.4952,\"PHP\":52.962,\"PLN\":4.3739,\"RON\":4.4922,\"RUB\":63.268,\"SEK\":9.4875,\"SGD\":1.5206,\"THB\":37.74,\"TRY\":4.0387,\"USD\":1.0661,\"ZAR\":14.408}}";

        $dataRetriever = new GetForexData();
        $raw_data = $dataRetriever->fetchData();

        $data = '';
        foreach ( $raw_data as $d){
            $data = $data."\n".json_encode($d);
        }
        return $this->render('showData.html.twig', array(
            'resp_json'=> $data
        ));
    }


}