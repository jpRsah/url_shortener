url_shortener
=============

A Symfony project created on July 29, 2017, 9:55 am.

Kalinichenko Roman, jp.rsah@gmail.com.

Description
=============

Symfony 3.3/PHP 7.0.18/mysql was used in the server side of this application.

Form is created with two input fields at the main page:

1. Field for your url.
2. Field for shortcode (your or generated).


Verification of data in 3 layers:

1. Verification of url with html.
2. Verification of real Url with `curl` and uniqueness short code in the server side. [Broken link Validator](src/AppBundle/Validator/Constraints/BrokenlinkValidator.php), [Has In BD Validator](src/AppBundle/Validator/Constraints/HasInBDValidator.php)
3. Uniqueness shortcode in the data base.

## To use API

```
$shorturl=file_get_contents('https://soul-fiber.ru/get/api?url='.rawurlencode('URL');

```
URL - your url for create short url.


- - -

## Instructions

This task should be implemented in either PHP, Ruby, Python, or Javascript. 
You can use frameworks, ORMs, template’s engines, but not ready solutions. 
Code should be provided as a public GitHub repo. 
README file with detailed information is required. 
Host the application somewhere and share a working link to it.
Use Bootstrap for styles.

## Task

1. Application should have form with field where user can put valid url (validation should be done by direct call of the provided url and check HTTP response code).
2. Application should generate short url. Example: http://domaincom/cedwdsfl
3. It should be possible to enter desired short url (another field).
4. Application should validate if requested short url is not in use yet.
5. Application should store original and short url pair in DB. User than can share short url with other users and once they try to access short url they should be redirected to
original url.

## Extra Credit

1. Application should have configuration file. logging system.
2. Application should remove origin-short url pair from DB on the 15th day after its creation.
3. Application should count amount of short url usage. Application should have API for short url creations
4. GitHub repo should contain a descriptive commits history