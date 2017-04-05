<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

use JDR\Mailer\Email\Email;

class SubjectResolver implements EmailPartResolver
{
    /**
     * {@inheritdoc}
     */
    public function addPart(Email $email, EmailPart $part)
    {
        $subject = $this->resolveSubject($part);
        $email->setSubject($subject);
    }

    /**
     * Resolve the subject.
     *
     * @return string
     */
    private function resolveSubject(Subject $part)
    {
        $subject = $part->getSubject();
        foreach ($part->getParameters() as $search => $replace) {
            $subject = str_replace($search, $replace, $subject);
        }

        return $subject;
    }
}
