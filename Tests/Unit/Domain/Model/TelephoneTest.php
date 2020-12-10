<?php

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Domain\Model;

use Nimut\TestingFramework\TestCase\UnitTestCase;

/**
 * Test case.
 */
class TelephoneTest extends UnitTestCase
{
    /**
     * @var Telephone
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new Telephone();
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getFirstNameInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getFirstName()
        );
    }

    /**
     * @test
     */
    public function setFirstNameSetsFirstName()
    {
        $this->subject->setFirstName('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getFirstName()
        );
    }

    /**
     * @test
     */
    public function setFirstNameWithIntegerResultsInString()
    {
        $this->subject->setFirstName(123);
        self::assertSame('123', $this->subject->getFirstName());
    }

    /**
     * @test
     */
    public function setFirstNameWithBooleanResultsInString()
    {
        $this->subject->setFirstName(true);
        self::assertSame('1', $this->subject->getFirstName());
    }

    /**
     * @test
     */
    public function getLastNameInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getLastName()
        );
    }

    /**
     * @test
     */
    public function setLastNameSetsLastName()
    {
        $this->subject->setLastName('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getLastName()
        );
    }

    /**
     * @test
     */
    public function setLastNameWithIntegerResultsInString()
    {
        $this->subject->setLastName(123);
        self::assertSame('123', $this->subject->getLastName());
    }

    /**
     * @test
     */
    public function setLastNameWithBooleanResultsInString()
    {
        $this->subject->setLastName(true);
        self::assertSame('1', $this->subject->getLastName());
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString()
    {
        self::assertSame(
            '',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailSetsEmail()
    {
        $this->subject->setEmail('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getEmail()
        );
    }

    /**
     * @test
     */
    public function setEmailWithIntegerResultsInString()
    {
        $this->subject->setEmail(123);
        self::assertSame('123', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function setEmailWithBooleanResultsInString()
    {
        $this->subject->setEmail(true);
        self::assertSame('1', $this->subject->getEmail());
    }
}
