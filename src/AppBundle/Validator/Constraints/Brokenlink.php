<?php
// src/AppBundle/Validator/Constraints/Brokenlink.php
namespace AppBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Brokenlink extends Constraint
{
    public $message = 'The url "{{ url }}" is broken';
}