<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Email;
use JDR\Mailer\Email\Address;
use JDR\Mailer\Part\Recipients;
use JDR\Mailer\Part\RecipientsResolver;

class RecipientsResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testResolverSetsToAddressesOnEmail()
    {
        $recipients = new Recipients(
            new Address('hello@example.com', 'Some Name'),
            new Address('test@example.com')
        );

        $email = $this->prophesize(Email::class);
        $email->setTo($recipients->getAddresses())->shouldBeCalled();

        $resolver = new RecipientsResolver();
        $resolver->addPart($email->reveal(), $recipients);
    }
}
