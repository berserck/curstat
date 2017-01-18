<?php
/**
 * Created by PhpStorm.
 * User: pgp
 * Date: 2017.01.18
 * Time: 14:43
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class AboutController
{

    /**
     * @Route("/about")
     */
    public function showAbout(){
        return new Response('Hello world!');
    }
}