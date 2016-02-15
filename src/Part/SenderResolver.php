<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

use JDR\Mailer\Email\Email;

class SenderResolver implements EmailPartResolver
{
    /**
     * {@inheritdoc}
     */
    public function addPart(Email $email, EmailPart $part)
    {
        $address = $part->getAddress();
        $email->setSender($address);
    }
}
