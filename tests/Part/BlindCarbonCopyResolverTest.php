<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Email;
use JDR\Mailer\Email\Address;
use JDR\Mailer\Part\BlindCarbonCopy;
use JDR\Mailer\Part\BlindCarbonCopyResolver;

class BlindCarbonCopyResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testResolverSetsBccAddressesOnEmail()
    {
        $bcc = new BlindCarbonCopy(
            new Address('hello@example.com', 'Some Name'),
            new Address('test@example.com')
        );

        $email = $this->prophesize(Email::class);
        $email->setBcc($bcc->getAddresses())->shouldBeCalled();

        $resolver = new BlindCarbonCopyResolver();
        $resolver->addPart($email->reveal(), $bcc);
    }
}
