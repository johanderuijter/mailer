<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

class Template implements EmailPart
{
    /**
     * @var string
     */
    private $contentType;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string[]
     */
    private $parameters;

    /**
     * Constructor.
     *
     * @param string $contentType
     * @param string $path
     * @param string[] $parameters
     */
    public function __construct(string $contentType, string $path, array $parameters = [])
    {
        $this->contentType = $contentType;
        $this->path = $path;
        $this->parameters = $parameters;
    }

    /**
     * Get content type of the template.
     *
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * Get path of the template.
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Get parameters used in the template.
     *
     * @return string
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}
