<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Urlcontact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RedirectController extends Controller
{
    /**
     * @Route("/{shortcut}", name="shortcut", requirements={"shortcut": "[a-zA-Z0-9]{1,20}"})
     */
 public function showAction(Request $request, $shortcut)
    {
        

     $shortcut = $request->attributes->get('shortcut');
      $em = $this->getDoctrine()->getManager();
     $code = $this->getDoctrine()
            ->getRepository(Urlcontact::class)
            ->findByShortcut($shortcut);

        if (!$code) {
            throw $this->createNotFoundException('Сокращение не найдено');
        }


    $repository = $this->getDoctrine()->getRepository(Urlcontact::class);


    $arr_list = $repository->findByShortcut($shortcut);
    $cnt = $arr_list[0]->getCount();
    $arr_list[0]->setCount($cnt+1);
    $em->flush();
    //print_r($arr_list[0]->setCount($cnt++));

    return $this->redirect($arr_list[0]->getUrl());
/*
        return new Response(
            '<html><body> !!! : '.$arr_list[0]->getCount().'</body></html>'
        );
    */
    }

} 
