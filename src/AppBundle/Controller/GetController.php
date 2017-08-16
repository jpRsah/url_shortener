<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Urlcontact;
use AppBundle\Entity\Url;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\BrokenlinkValidator;

class GetController extends Controller
{
  
  /**
   * 
   * @Route("/get/api.{_format}",
   *     defaults={"_format": "html"})
   */


    
    public function showAction(Request $request)
    {
        
        
        $url = $request->query->get('url');
        $url = rawurldecode($url);

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

 
