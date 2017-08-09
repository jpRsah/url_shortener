<?php
// src/AppBundle/Validator/Constraints/HasInBD.php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class HasInBD extends Constraint
{
    public $message = 'The string "{{ string }}" exist in database';
}