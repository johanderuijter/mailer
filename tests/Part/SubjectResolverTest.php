<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Email\Email;
use JDR\Mailer\Part\Subject;
use JDR\Mailer\Part\SubjectResolver;

class SubjectResolverTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validSubjectProvider
     */
    public function testResolverCombinesSubjectStringWithParameters($subjectString, $parameters, $resolvedSubject)
    {
        $subject = new Subject($subjectString, $parameters);

        $email = $this->prophesize(Email::class);
        $email->setSubject($resolvedSubject)->shouldBeCalled();

        $resolver = new SubjectResolver();
        $resolver->addPart($email->reveal(), $subject);
    }

    public function validSubjectProvider()
    {
        return [
            [
                'Welcome you!',
                [],
                'Welcome you!',
            ],
            [
                'Hello {{ name }}!',
                [
                    '{{ name }}' => 'you',
                ],
                'Hello you!'
            ],
            [
                'These are not the droids you are looking for!',
                [
                    '{{ test }}' => 'should not be used',
                ],
                'These are not the droids you are looking for!',
            ],
        ];
    }
}
