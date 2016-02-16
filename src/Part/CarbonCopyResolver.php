<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

use JDR\Mailer\Email\Email;

class CarbonCopyResolver implements EmailPartResolver
{
    /**
     * {@inheritdoc}
     */
    public function addPart(Email $email, EmailPart $part)
    {
        $addresses = $part->getAddresses();
        $email->setCc($addresses);
    }
}
