<?php declare(strict_types = 1);

namespace JDR\Mailer;

use InvalidArgumentException;
use JDR\Mailer\Part\EmailPart;
use JDR\Mailer\Part\EmailPartResolver;

class PartResolverRegistry
{
    /**
     * @var EmailPartResolver[]
     */
    private $resolvers;

    /**
     * Add Resolver.
     *
     * @param EmailPartResolver $resolver
     * @param string $part
     *
     * @return self
     */
    public function addResolver(EmailPartResolver $resolver, $part): self
    {
        $this->resolvers[$part] = $resolver;

        return $this;
    }

    /**
     * Get resolver for given email part.
     *
     * @param EmailPart $part
     *
     * @return EmailPartResolver
     */
    public function getResolverForPart(EmailPart $part): EmailPartResolver
    {
        $identifier = get_class($part);

        if (!array_key_exists($identifier, $this->resolvers)) {
            throw InvalidArgumentException(sprintf(
                'Resolver for the part %s does not exists. Please choose one of the following: $s',
                $identifier,
                implode(', ', array_keys($this->resolvers))
            ));
        }

        return $this->resolvers[$identifier];
    }
}
