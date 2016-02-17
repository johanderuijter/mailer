<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Part\Message;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validSubjectProvider
     */
    public function testMessageContainsContentType($contentType, $body, $parameters)
    {
        $message = new Message($contentType, $body);

        $this->assertEquals($contentType, $message->getContentType());
    }

    /**
     * @dataProvider validSubjectProvider
     */
    public function testMessageContainsBody($contentType, $body, $parameters)
    {
        $message = new Message($contentType, $body);

        $this->assertEquals($body, $message->getBody());
    }

    /**
     * @dataProvider validSubjectProvider
     */
    public function testMessageParametersAreOptional($contentType, $body, $parameters)
    {
        $message = new Message($contentType, $body);

        $this->assertEquals([], $message->getParameters());
    }

    /**
     * @dataProvider validSubjectProvider
     */
    public function testMessageContainsParametersWhenProvided($contentType, $body, $parameters)
    {
        $message = new Message($contentType, $body, $parameters);

        $this->assertEquals($parameters, $message->getParameters());
    }

    public function validSubjectProvider()
    {
        return [
            [
                'text/plain',
                'Welcome you!',
                []
            ],
            [
                'text/html',
                '<h1>Hello {{ name }}!</h1>',
                [
                    '{{ name }}' => 'you',
                ]
            ],
        ];
    }
}
