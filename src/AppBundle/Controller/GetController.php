<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Urlcontact;
use AppBundle\Entity\Url;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

//use FOS\RestBundle\Controller\Annotations\Get;
//use FOS\RestBundle\Controller\Annotations as Rest;
//use FOS\RestBundle\Controller\FOSRestController;
//use FOS\RestBundle\View\View;

use Symfony\Component\Validator\BrokenlinkValidator;

class GetController extends Controller
{
  
  /**
   * 
   * @Route("/get/{url}.{_format}",
   *     defaults={"_format": "html"})
   */


    
    public function showAction(Request $request, $url)
    {
        //$dfd = urlencode("https://www.rgs.ru/products/private_person/auto/osago/calc/index.wbp");
        $url = urldecode($url);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

          if(curl_errno($ch))
        {
           return  $this->json( 'curl: ' . curl_error($ch)); 
        }
        curl_close($ch);


        $em = $this->getDoctrine()->getManager();
        $shortcut = bin2hex(random_bytes(7));
             
             $urlcontact = new Urlcontact(url);
             $urlcontact->setUrl($url);
             $urlcontact->setShortcut($shortcut);
             $urlcontact->setDatetime();
             $urlcontact->setCount("0");

            $em->persist($urlcontact);

            $em->flush();
           return  $this->json($request->getScheme(). '://' . $request->getHttpHost(). '/' . $shortcut);       
    }

}

 
