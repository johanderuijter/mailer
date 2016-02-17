<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Email;
use JDR\Mailer\Email\Address;
use JDR\Mailer\Part\CarbonCopy;
use JDR\Mailer\Part\CarbonCopyResolver;

class CarbonCopyResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testResolverSetsCcAddressesOnEmail()
    {
        $cc = new CarbonCopy(
            new Address('hello@example.com', 'Some Name'),
            new Address('test@example.com')
        );

        $email = $this->prophesize(Email::class);
        $email->setCc($cc->getAddresses())->shouldBeCalled();

        $resolver = new CarbonCopyResolver();
        $resolver->addPart($email->reveal(), $cc);
    }
}
