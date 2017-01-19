<?php
/**
 * Created by PhpStorm.
 * User: pgp
 * Date: 1/18/17
 * Time: 5:45 PM
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class CorrelationController extends Controller
{
    /**
     * @Route("/cor/{date}")
     */
    public function showCorrelation($date)
    {
        return $this->render('correlation/show.html.twig', array(
            'date' => $date
        ));
    }

}