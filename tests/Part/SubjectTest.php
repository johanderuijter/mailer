<?php declare(strict_types = 1);

namespace JDR\Mailer\Test\Part;

use JDR\Mailer\Part\Subject;

class SubjectTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider validSubjectProvider
     */
    public function testSubjectContainsSubjectString($subjectString, $parameters)
    {
        $subject = new Subject($subjectString);

        $this->assertEquals($subjectString, $subject->getSubject());
    }

    /**
     * @dataProvider validSubjectProvider
     */
    public function testSubjectParametersAreOptional($subjectString, $parameters)
    {
        $subject = new Subject($subjectString);

        $this->assertEquals([], $subject->getParameters());
    }

    /**
     * @dataProvider validSubjectProvider
     */
    public function testSubjectContainsParametersWhenProvided($subjectString, $parameters)
    {
        $subject = new Subject($subjectString, $parameters);

        $this->assertEquals($parameters, $subject->getParameters());
    }

    public function validSubjectProvider()
    {
        return [
            [
                'Welcome you!',
                []
            ],
            [
                'Hello {{ name }}!',
                [
                    '{{ name }}' => 'you',
                ]
            ],
        ];
    }
}
