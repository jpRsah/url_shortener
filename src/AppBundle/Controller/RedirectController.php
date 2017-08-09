<?php

namespace AppBundle\Controller;

/*use AppBundle\Entity\Url;
use AppBundle\Entity\Urlcontact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\UrlType;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
*/
use AppBundle\Entity\Urlcontact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RedirectController extends Controller
{
    /**
     * @Route("/{shortcut}", name="shortcut", requirements={"shortcut": "[a-zA-Z0-9]{1,20}"})
     */
 public function showAction(Request $request, $shortcut)
    {
        

     $shortcut = $request->attributes->get('shortcut');
 
     $code = $this->getDoctrine()
            ->getRepository(Urlcontact::class)
            ->findByShortcut($shortcut);

        if (!$code) {
            throw $this->createNotFoundException('Сокращение не найдено');
        }


    $repository = $this->getDoctrine()->getRepository(Urlcontact::class);


    $products = $repository->findByShortcut($shortcut);

    //print_r($products[0]->getUrl());

    return $this->redirect($products[0]->getUrl());

      /*  return new Response(
            '<html><body> !!! : '.$products[0]->getUrl().'</body></html>'
        );
    */
    }

} 
