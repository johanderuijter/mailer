<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

use JDR\Mailer\Email\Email;

interface EmailPartResolver
{
    /**
     * Add part to Email.
     *
     * @param Email $email
     * @param EmailPart $part
     */
    public function addPart(Email $email, EmailPart $part);
}
