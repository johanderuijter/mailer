<?php declare(strict_types = 1);

namespace JDR\Mailer\Template;

use RuntimeException;

interface Engine
{
    /**
     * Renders a template.
     *
     * @param string $name
     * @param string[] $parameters
     *
     * @return string
     *
     * @throws RuntimeException if the template cannot be rendered
     */
    public function render(string $name, array $parameters = []);
}
