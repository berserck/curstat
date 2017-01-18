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
use Symfony\Component\HttpFoundation\Response;


class CorrelationController extends Controller
{
    /**
     * @Route("/cor/{date}")
     */
    public function showCorrelation($date)
    {
        $templating = $this->container->get('templating');
        $html = $templating->render('correlation/show.html.twig', array(
            'date' => $date
        ));
        return new Response($html);
    }

}