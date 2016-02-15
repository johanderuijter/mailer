<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

use JDR\Mailer\Email\Email;

class RecipientsResolver implements EmailPartResolver
{
    /**
     * {@inheritdoc}
     */
    public function addPart(Email $email, EmailPart $part)
    {
        $addresses = $part->getAddresses();
        $email->setTo($addresses);
    }
}
