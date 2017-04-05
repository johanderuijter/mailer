<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Email;
use JDR\Mailer\Email\Address;
use JDR\Mailer\Part\Sender;
use JDR\Mailer\Part\SenderResolver;

class SenderResolverTest extends \PHPUnit_Framework_TestCase
{
    public function testResolverSetsBccAddressesOnEmail()
    {
        $sender = new Sender(
            new Address('hello@example.com', 'Some Name')
        );

        $email = $this->prophesize(Email::class);
        $email->setSender($sender->getAddress())->shouldBeCalled();

        $resolver = new SenderResolver();
        $resolver->addPart($email->reveal(), $sender);
    }
}
