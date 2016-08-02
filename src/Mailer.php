<?php declare(strict_types = 1);

namespace JDR\Mailer;

interface Mailer
{
    /**
     * Send email.
     *
     * @param EmailType $type
     */
    public function sendEmail(EmailType $type);
}
