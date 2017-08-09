<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;
use AppBundle\Entity\Url;
use AppBundle\Entity\Urlcontact;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;


class LuckyController extends Controller
{
   /**
     * @Route("/", name="homepage")
     */
 public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        
        
        $shortcut = bin2hex(random_bytes(5));
        $url = new Url();
        //$task->setTask('');

        $form = $this->createFormBuilder($url)
            ->add('url', UrlType::class, array('label' => 'Первичный URL ', 
                'attr' => array(
                    'placeholder' => 'введите url',
                    'class' => 'form-control',
                    )
                )
            )
            ->add('shortcut', TextType::class, array(
              'label' => 'Выберите сокращение' /*.$request->getScheme(). '://' . $request->getHttpHost(). '/'*/,
              'data' => $shortcut, 
              'attr' => array(
                    'placeholder' => 'введите url',
                    'class' => 'form-control',
                    )                  
                )

            )
  
            ->add('save', SubmitType::class, array('label' => 'Сохранить', 
                'attr' => array(
                    'placeholder' => 'введите url',
                    'class' => 'btn btn-primary',
                   
                    )
                ))
            ->getForm();



        $form->handleRequest($request);
       

        if ($form->isSubmitted() && $form->isValid()) {
          $em = $this->getDoctrine()->getManager();
             
             $url = $form->getData();
   
             $urlcontact = new Urlcontact();

             $urlcontact->setUrl($form->get('url')->getData());
             $urlcontact->setShortcut($form->get('shortcut')->getData());
             $urlcontact->setDatetime();

            $em->persist($urlcontact);

            $em->flush();
                     return $this->render('geturl.html.twig', array(
              'shortcut' => $url->getShortcut()
            ));
                
      

      

            //$form->get('shortcut')->setData();
           //return $this->redirectToRoute('homepage');
           
           //return $this->redirectToRoute('homepage', array('shortcut' => $form->get('shortcut')->getData()));
         /* return new Response(
                '<html><body>Ваш код : '<a href="http://127.0.0.1:8000/ээ shortcut ">http://127.0.0.1:8000/{{ shortcut }}'</body></html>'
            );*/

      /*unset($urlcontact);
      unset($form);
      $urlcontact = new Urlcontact();*/
      //$form = $this->createForm(new EntityType(), $urlcontact);
  


        }
//return $this->redirectToRoute('homepage');
        return $this->render('lucky/number.html.twig', array('form' => $form->createView(),
        ));
        
    }

} 

