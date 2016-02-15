<?php declare(strict_types = 1);

namespace JDR\Mailer;

interface Mailer
{
    /**
     * Send email.
     *
     * @param EmailType $email
     */
    public function sendEmail(EmailType $type);
}
