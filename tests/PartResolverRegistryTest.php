<?php declare(strict_types = 1);

namespace JDR\Mailer\Test;

use JDR\Mailer\Part\EmailPartResolver;
use JDR\Mailer\PartResolverRegistry;
use JDR\Mailer\Test\Fixtures\Part\EmailPart;

class PartResolverRegistryTest extends \PHPUnit_Framework_TestCase
{
    public function testRegistryThrowsExeptionWhenRetrievingResolverNotIncluded()
    {
        $this->expectException(\InvalidArgumentException::class);

        $registry = new PartResolverRegistry();

        $part = $this->prophesize(EmailPart::class);
        $registry->getResolverForPart($part->reveal());
    }

    public function testAddingResolversCanBeChained()
    {
        $registry = new PartResolverRegistry();

        $resolver = $this->prophesize(EmailPartResolver::class);
        $chain = $registry->addResolver($resolver->reveal(), EmailPart::class);

        $this->assertInstanceOf(PartResolverRegistry::class, $chain);

        return $registry;
    }

    /**
     * @depends testAddingResolversCanBeChained
     */
    public function testResolversCanBeRetrievedFromRegistry($registry)
    {
        $part = new EmailPart();
        $this->assertInstanceOf(EmailPartResolver::class, $registry->getResolverForPart($part));
    }
}
