<?php declare(strict_types = 1);

namespace JDR\Mailer\Test;

use JDR\Mailer\Email\Email;
use JDR\Mailer\EmailBuilder;
use JDR\Mailer\Part\EmailPartResolver;
use JDR\Mailer\PartResolverRegistry;
use JDR\Mailer\Test\Fixtures\Part\EmailPart;

class EmailBuilderTest extends \PHPUnit_Framework_TestCase
{
    public function testAddingPartsCanBeChained()
    {
        $part = $this->prophesize(EmailPart::class);
        $registry = $this->prophesize(PartResolverRegistry::class);

        $builder = new EmailBuilder($registry->reveal());
        $chain = $builder->add($part->reveal());

        $this->assertInstanceOf(EmailBuilder::class, $chain);
    }

    public function testBuild()
    {
        $part = new EmailPart();
        $resolver = $this->prophesize(EmailPartResolver::class);
        $registry = $this->prophesize(PartResolverRegistry::class);
        $email = $this->prophesize(Email::class);

        $registry->getResolverForPart($part)->willReturn($resolver);

        $builder = new EmailBuilder($registry->reveal());
        $builder->add($part);
        $builder->build($email->reveal());

        $registry->getResolverForPart($part)->shouldHaveBeenCalled();
        $resolver->addPart($email->reveal(), $part)->shouldHaveBeenCalled();
    }
}
