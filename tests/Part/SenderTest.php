<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Address;
use JDR\Mailer\Part\Sender;

class SenderTest extends \PHPUnit_Framework_TestCase
{
    public function testSenderContainsAddresses()
    {
        $address = new Address('hello@example.com', 'Some Name');
        $sender = new Sender($address);

        $this->assertEquals($address, $sender->getAddress());
    }

    public function testSenderMustContainOneAddress()
    {
        $this->expectException(\TypeError::class);

        $recipients = new Sender();
    }
}
