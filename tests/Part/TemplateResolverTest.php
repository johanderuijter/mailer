<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Email;
use JDR\Mailer\Email\Message as EmailMessage;
use JDR\Mailer\Part\Template;
use JDR\Mailer\Part\TemplateResolver;
use JDR\Mailer\Template\Engine;

class TemplateResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validTemplateProvider
     */
    public function testResolverRendersTemplate($contentType, $path, $parameters, $resolvedBody)
    {
        $template = new Template($contentType, $path, $parameters);
        $emailMessage = new EmailMessage($contentType, $resolvedBody);

        $email = $this->prophesize(Email::class);
        $email->addMessage($emailMessage)->shouldBeCalled();

        $templateEngine = $this->prophesize(Engine::class);
        $templateEngine->render($path, $parameters)->willReturn($resolvedBody);

        $resolver = new TemplateResolver($templateEngine->reveal());
        $resolver->addPart($email->reveal(), $template);
    }

    public function validTemplateProvider()
    {
        return [
            [
                'text/plain',
                'Welcome you!',
                [],
                'Welcome you!',
            ],
            [
                'text/html',
                '<h1>Hello {{ name }}!</h1>',
                [
                    'name' => 'you',
                ],
                '<h1>Hello you!</h1>'
            ],
            [
                'text/plain',
                'These are not the droids you are looking for!',
                [
                    'test' => 'should not be used',
                ],
                'These are not the droids you are looking for!',
            ],
        ];
    }
}
