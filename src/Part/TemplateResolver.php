<?php declare(strict_types = 1);

namespace JDR\Mailer\Part;

use JDR\Mailer\Email\Email;
use JDR\Mailer\Email\Message;
use JDR\Mailer\Template\Engine;

class TemplateResolver implements EmailPartResolver
{
    /**
     * @var Engine
     */
    private $templateEngine;

    /**
     * Constructor.
     *
     * @param Engine $templateEngine
     */
    public function __construct(Engine $templateEngine)
    {
        $this->templateEngine = $templateEngine;
    }

    /**
     * {@inheritdoc}
     */
    public function addPart(Email $email, EmailPart $part)
    {
        $body = $this->render($part);
        $contentType = $part->getContentType();
        $email->addMessage(new Message($contentType, $body));
    }

    /**
     * Render the template.
     *
     * @param Template $part
     *
     * @return string
     */
    private function render(Template $part)
    {
        return $this->templateEngine
            ->render($part->getPath(), $part->getParameters());
    }
}
