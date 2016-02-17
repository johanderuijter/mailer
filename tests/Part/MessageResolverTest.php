<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Email;
use JDR\Mailer\Email\Message as EmailMessage;
use JDR\Mailer\Part\Message;
use JDR\Mailer\Part\MessageResolver;

class MessageResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validMessageProvider
     */
    public function testResolverCombinesMessageStringWithParameters($contentType, $body, $parameters, $resolvedBody)
    {
        $message = new Message($contentType, $body, $parameters);
        $emailMessage = new EmailMessage($contentType, $resolvedBody);

        $email = $this->prophesize(Email::class);
        $email->addMessage($emailMessage)->shouldBeCalled();

        $resolver = new MessageResolver();
        $resolver->addPart($email->reveal(), $message);
    }

    public function validMessageProvider()
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
                    '{{ name }}' => 'you',
                ],
                '<h1>Hello you!</h1>'
            ],
            [
                'text/plain',
                'These are not the droids you are looking for!',
                [
                    '{{ test }}' => 'should not be used',
                ],
                'These are not the droids you are looking for!',
            ],
        ];
    }
}
