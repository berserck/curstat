<?php
/**
 * Created by PhpStorm.
 * User: pgp
 * Date: 1/20/17
 * Time: 11:46 AM
 */

namespace AppBundle\Controller;


use AppBundle\DataHandler;
use AppBundle\Services\GetForexData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class APIController
{
    /**
     * @Route("/api/stats", name="all_stats")
     * @Method("GET")
     */
    public function getStats(){
        // get the data
        $dataRetriever = new GetForexData();
        $raw_data = $dataRetriever->fetchData();

        $my_data_handler = new DataHandler();
        foreach ( $raw_data as $datum){
            $my_data_handler->importData($datum);
        }

        $stats = $my_data_handler->getStats();

        $response = ['reference' => 'EUR', 'stats' => $stats];

        return new JsonResponse($response);

    }

    /**
     * @param $cur
     *
     * @Route("/api/stats/{cur}", name="currency_stats")
     * @Method("GET")
     */
    public function getStatsCurrency($cur){
        // get the data
        $dataRetriever = new GetForexData();
        $raw_data = $dataRetriever->fetchData();

        $my_data_handler = new DataHandler();
        foreach ( $raw_data as $datum){
            $my_data_handler->importData($datum);
        }

        $all_stats = $my_data_handler->getStats();
        $stats = array_key_exists($cur, $all_stats) ? $all_stats[$cur] : '';
        $response = ['reference' => 'EUR', 'currency' => $cur, 'stats' => $stats];

        return new JsonResponse($response);
    }
}