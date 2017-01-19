<?php
/**
 * Created by PhpStorm.
 * User: pgp
 * Date: 2017.01.18
 * Time: 14:43
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{

    /**
     * @Route("/about",  name="about")
     */
    public function showAbout(){
        return $this->render('about.html.twig', array(
        ));
    }
}