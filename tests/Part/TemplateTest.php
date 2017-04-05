<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Part\Template;

class TemplateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validSubjectProvider
     */
    public function testTemplateContainsContentType($contentType, $path, $parameters)
    {
        $template = new Template($contentType, $path);

        $this->assertEquals($contentType, $template->getContentType());
    }

    /**
     * @dataProvider validSubjectProvider
     */
    public function testTemplateContainsPath($contentType, $path, $parameters)
    {
        $template = new Template($contentType, $path);

        $this->assertEquals($path, $template->getPath());
    }

    /**
     * @dataProvider validSubjectProvider
     */
    public function testTemplateParametersAreOptional($contentType, $path, $parameters)
    {
        $template = new Template($contentType, $path);

        $this->assertEquals([], $template->getParameters());
    }

    /**
     * @dataProvider validSubjectProvider
     */
    public function testTemplateContainsParametersWhenProvided($contentType, $path, $parameters)
    {
        $template = new Template($contentType, $path, $parameters);

        $this->assertEquals($parameters, $template->getParameters());
    }

    public function validSubjectProvider()
    {
        return [
            [
                'text/plain',
                'path/to/template.txt.twig',
                []
            ],
            [
                'text/html',
                'path/to/template.html.twig',
                [
                    'name' => 'you',
                ]
            ],
        ];
    }
}
