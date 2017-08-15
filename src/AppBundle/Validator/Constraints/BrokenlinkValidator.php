<?php
// src/AppBundle/Validator/Constraints/BrokenlinkValidator.php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class BrokenlinkValidator extends ConstraintValidator
{
	    	

    public function validate($value, Constraint $constraint)
    {

       
        $ch = curl_init($value);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

        $check = curl_errno($ch);
    
        curl_close($ch);

        if($check)
        {
           
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ url }}', $value)
                ->addViolation();
        }



    }
}
    
