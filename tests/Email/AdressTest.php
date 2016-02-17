<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Email;

use JDR\Mailer\Email\Address;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validAddressProvider
     */
    public function testMessageContainsEmail($email, $name)
    {
        $address = new Address($email);

        $this->assertEquals($email, $address->getEmail());
    }

    /**
     * @dataProvider validAddressProvider
     */
    public function testMessageNameIsOptional($email, $name)
    {
        $address = new Address($email);

        $this->assertNull($address->getName());
    }

    /**
     * @dataProvider validAddressProvider
     */
    public function testMessageContainsNameWhenProvided($email, $name)
    {
        $address = new Address($email, $name);

        $this->assertEquals($name, $address->getName());
    }

    public function validAddressProvider()
    {
        return [
            ['hello@example.com', null],
            ['test@example.com', 'Hello Example'],
        ];
    }
}
