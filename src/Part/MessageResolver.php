<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

use JDR\Mailer\Email\Email;
use JDR\Mailer\Email\Message as EmailMessage;

class MessageResolver implements EmailPartResolver
{
    /**
     * {@inheritdoc}
     */
    public function addPart(Email $email, EmailPart $part)
    {
        $body = $this->resolveBody($part);
        $contentType = $part->getContentType();
        $email->addMessage(new EmailMessage($contentType, $body));
    }

    /**
     * Resolve the body of the message.
     *
     * @return string
     */
    private function resolveBody(Message $part)
    {
        $body = $part->getBody();
        foreach ($part->getParameters() as $search => $replace) {
            $body = str_replace($search, $replace, $body);
        }

        return $body;
    }
}
