<?php
// src/AppBundle/Validator/Constraints/HasInBDValidator.php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Doctrine\ORM\EntityManager;





class HasInBDValidator extends ConstraintValidator
{
	    	private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function validate($value, Constraint $constraint)
    {


		$find = $this->entityManager->getRepository( 'AppBundle:Urlcontact')->findByShortcut($value);

        if ($find) {
        
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ string }}', $value)
                ->addViolation();
        }
    }
}
    
