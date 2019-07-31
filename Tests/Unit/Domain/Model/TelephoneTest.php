<?php
namespace JWeiland\Circular\Domain\Model;

/*
 * This file is part of the circular project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

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
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getFirstName());
    }

    /**
     * @test
     */
    public function setFirstNameWithBooleanResultsInString()
    {
        $this->subject->setFirstName(true);
        $this->assertSame('1', $this->subject->getFirstName());
    }

    /**
     * @test
     */
    public function getLastNameInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getLastName());
    }

    /**
     * @test
     */
    public function setLastNameWithBooleanResultsInString()
    {
        $this->subject->setLastName(true);
        $this->assertSame('1', $this->subject->getLastName());
    }

    /**
     * @test
     */
    public function getEmailInitiallyReturnsEmptyString()
    {
        $this->assertSame(
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

        $this->assertSame(
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
        $this->assertSame('123', $this->subject->getEmail());
    }

    /**
     * @test
     */
    public function setEmailWithBooleanResultsInString()
    {
        $this->subject->setEmail(true);
        $this->assertSame('1', $this->subject->getEmail());
    }
}
