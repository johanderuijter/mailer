<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

class Subject implements EmailPart
{
    /**
     * @var string
     */
    private $subject;

    /**
     * @var string[]
     */
    private $parameters;

    /**
     * Constructor.
     *
     * @param string $subject
     * @param string $parameters
     */
    public function __construct(string $subject, array $parameters = [])
    {
        $this->subject = $subject;
        $this->parameters = $parameters;
    }

    /**
     * Get subject of the message.
     *
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Get the parameters used in the subject.
     *
     * @return string[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
