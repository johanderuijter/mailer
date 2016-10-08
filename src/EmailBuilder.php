<?php declare(strict_types = 1);

namespace JDR\Mailer;

use JDR\Mailer\Email\Email;
use JDR\Mailer\Part\EmailPart;

class EmailBuilder
{
    /**
     * @var PartResolverRegistry
     */
    private $registry;

    /**
     * @var EmailPart[]
     */
    private $parts;

    /**
     * Constructor.
     *
     * @param PartResolverRegistry $registry
     */
    public function __construct(PartResolverRegistry $registry)
    {
        $this->registry = $registry;
    }

    /**
     * Add part to email.
     *
     * @param EmailPart $part
     *
     * @return self
     */
    public function add(EmailPart $part): self
    {
        $this->parts[] = $part;

        return $this;
    }

    /**
     * Build email from parts.
     *
     * @param Email $email
     *
     * @return Email
     */
    public function build(Email $email): Email
    {
        foreach ($this->parts as $part) {
            $resolver = $this->registry->getResolverForPart($part);
            $resolver->addPart($email, $part);
        }

        $this->parts = [];

        return $email;
    }
}
