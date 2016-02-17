<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Address;
use JDR\Mailer\Part\Recipients;

class RecipientsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validAddressesProvider
     */
    public function testRecipientsContainsAddresses($addresses)
    {
        $recipients = new Recipients(...$addresses);

        $this->assertEquals($addresses, $recipients->getAddresses());
    }

    public function testRecipientsMustContainAtLeastOneAddress()
    {
        $this->expectException(\InvalidArgumentException::class);

        $recipients = new Recipients();
    }

    public function validAddressesProvider()
    {
        return [
            [[
                new Address('hello@example.com', 'Some Name'),
                new Address('test@example.com'),
            ]],
        ];
    }
}
