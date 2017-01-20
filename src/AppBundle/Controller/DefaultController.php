<?php

namespace AppBundle\Controller;

use AppBundle\DataHandler;
use AppBundle\Services\GetForexData;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $base = 'EUR';

        // get the data
        $dataRetriever = new GetForexData();
        $raw_data = $dataRetriever->fetchData();
        // import data

        $my_data_handler = new DataHandler();
        foreach ( $raw_data as $datum){
            //print_r($datum);
            $my_data_handler->importData($datum);
        }

        $dates = $my_data_handler->getDates();
        //print_r($dates);
        $rates = $my_data_handler->getData();
//        print_r($rates);
        // process
        $stats = $my_data_handler->getStats();
//        print_r($stats);
        // make results available
        return $this->render('default.html.twig', array(
            'base'=> $base, 'dates' => $dates, 'rates' => $rates, 'stats' => $stats
        ));
    }
}
