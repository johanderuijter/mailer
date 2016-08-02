<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Address;
use JDR\Mailer\Part\BlindCarbonCopy;

class BlindCarbonCopyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validAddressesProvider
     */
    public function testBlindCarbonCopyContainsAddresses($addresses)
    {
        $recipients = new BlindCarbonCopy(...$addresses);

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
