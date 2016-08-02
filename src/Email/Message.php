<?php declare(strict_types = 1);

namespace JDR\Mailer\Email;

class Message
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
     * Constructor.
     *
     * @param string $contentType
     * @param string $body
     */
    public function __construct(string $contentType, string $body)
    {
        $this->contentType = $contentType;
        $this->body = $body;
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
}
