<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

class Message implements EmailPart
{
    /**
     * @var string
     */
    private $contentType;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string[]
     */
    private $parameters;

    /**
     * Constructor.
     *
     * @param string $contentType
     * @param string $body
     * @param string[] $parameters
     */
    public function __construct(string $contentType, string $body, array $parameters = [])
    {
        $this->contentType = $contentType;
        $this->body = $body;
        $this->parameters = $parameters;
    }

    /**
     * Get content type of the message.
     *
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * Get body of the message.
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * Get parameters of the message.
     *
     * @return string[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
