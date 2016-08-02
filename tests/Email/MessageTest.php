<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Email;

use JDR\Mailer\Email\Message;

class MessageTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validMessageProvider
     */
    public function testMessageContainsContentType($contentType, $body)
    {
        $message = new Message($contentType, $body);

        $this->assertEquals($contentType, $message->getContentType());
    }

    /**
     * @dataProvider validMessageProvider
     */
    public function testMessageContainsBody($contentType, $body)
    {
        $message = new Message($contentType, $body);

        $this->assertEquals($body, $message->getBody());
    }

    public function validMessageProvider()
    {
        return [
            ['text/html', '<html><body>Some Message Body</body></html>'],
            ['text/plain', 'Some Message Body'],
        ];
    }
}
