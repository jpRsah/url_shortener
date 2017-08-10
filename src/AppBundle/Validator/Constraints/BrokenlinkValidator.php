<?php
// src/AppBundle/Validator/Constraints/BrokenlinkValidator.php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;


class BrokenlinkValidator extends ConstraintValidator
{
	    	

    public function validate($value, Constraint $constraint)
    {

        // Создаем дескриптор curl к несуществующему адресу
        $ch = curl_init($value);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);

        $check = curl_errno($ch);
        // Закрываем дескриптор
        curl_close($ch);
        // Проверяем наличие ошибки
        if($check)
        {
           // echo 'Ошибка curl: ' . curl_error($ch);
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ url }}', $value)
                ->addViolation();
        }



    }
}
    
