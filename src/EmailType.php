<?php declare(strict_types = 1);

namespace JDR\Mailer;

interface EmailType
{
    /**
     * Build the email.
     *
     * @param EmailBuilder $builder
     */
    public function buildEmail(EmailBuilder $builder);
}
