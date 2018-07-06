<?php

namespace App\Shop\Contacts\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ContactNotFoundException extends NotFoundHttpException
{

    /**
     * BlogNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct('Contact not found.');
    }
}
