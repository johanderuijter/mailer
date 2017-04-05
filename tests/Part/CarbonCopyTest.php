<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Address;
use JDR\Mailer\Part\CarbonCopy;

class CarbonCopyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validAddressesProvider
     */
    public function testCarbonCopyContainsAddresses($addresses)
    {
        $recipients = new CarbonCopy(...$addresses);

        $this->assertEquals($addresses, $recipients->getAddresses());
    }

    public function validAddressesProvider()
    {
        return [
            [[]],
            [[
                new Address('hello@example.com', 'Some Name'),
                new Address('test@example.com'),
            ]],
        ];
    }
}
