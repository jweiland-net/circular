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
class CircularTest extends UnitTestCase
{
    /**
     * @var Circular
     */
    protected $subject;

    public function setUp()
    {
        $this->subject = new Circular();
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function getNumberInitiallyReturnsEmptyString()
    {
        $this->assertSame(
            '',
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberSetsNumber()
    {
        $this->subject->setNumber('foo bar');

        $this->assertSame(
            'foo bar',
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberWithIntegerResultsInString()
    {
        $this->subject->setNumber(123);
        $this->assertSame('123', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function setNumberWithBooleanResultsInString()
    {
        $this->subject->setNumber(true);
        $this->assertSame('1', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        $this->assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleSetsTitle()
    {
        $this->subject->setTitle('foo bar');

        $this->assertSame(
            'foo bar',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleWithIntegerResultsInString()
    {
        $this->subject->setTitle(123);
        $this->assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        $this->assertSame('1', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function getCategoryInitiallyReturnsNull()
    {
        $this->assertNull($this->subject->getCategory());
    }

    /**
     * @test
     */
    public function setCategorySetsCategory()
    {
        $instance = new Category();
        $this->subject->setCategory($instance);

        $this->assertSame(
            $instance,
            $this->subject->getCategory()
        );
    }

    /**
     * @test
     */
    public function getDateOfCircularInitiallyReturnsNull()
    {
        $this->assertNull(
            $this->subject->getDateOfCircular()
        );
    }

    /**
     * @test
     */
    public function setDateOfCircularSetsDateOfCircular()
    {
        $date = new \DateTime();
        $this->subject->setDateOfCircular($date);

        $this->assertSame(
            $date,
            $this->subject->getDateOfCircular()
        );
    }

    /**
     * @test
     */
    public function getDepartmentInitiallyReturnsNull()
    {
        $this->assertNull($this->subject->getDepartment());
    }

    /**
     * @test
     */
    public function setDepartmentSetsDepartment()
    {
        $instance = new Department();
        $this->subject->setDepartment($instance);

        $this->assertSame(
            $instance,
            $this->subject->getDepartment()
        );
    }

    /**
     * @test
     */
    public function getSendInitiallyReturnsFalse()
    {
        $this->assertFalse(
            $this->subject->getSend()
        );
    }

    /**
     * @test
     */
    public function setSendSetsSend()
    {
        $this->subject->setSend(true);
        $this->assertTrue(
            $this->subject->getSend()
        );
    }

    /**
     * @test
     */
    public function setSendWithStringReturnsTrue()
    {
        $this->subject->setSend('foo bar');
        $this->assertTrue($this->subject->getSend());
    }

    /**
     * @test
     */
    public function setSendWithZeroReturnsFalse()
    {
        $this->subject->setSend(0);
        $this->assertFalse($this->subject->getSend());
    }

    /**
     * @test
     */
    public function getFileNameInitiallyReturnsEmptyString()
    {
        $this->assertSame(
            '',
            $this->subject->getFileName()
        );
    }

    /**
     * @test
     */
    public function setFileNameSetsFileName()
    {
        $this->subject->setFileName('foo bar');

        $this->assertSame(
            'foo bar',
            $this->subject->getFileName()
        );
    }

    /**
     * @test
     */
    public function setFileNameWithIntegerResultsInString()
    {
        $this->subject->setFileName(123);
        $this->assertSame('123', $this->subject->getFileName());
    }

    /**
     * @test
     */
    public function setFileNameWithBooleanResultsInString()
    {
        $this->subject->setFileName(true);
        $this->assertSame('1', $this->subject->getFileName());
    }

    /**
     * @test
     */
    public function getFilesInitiallyReturnsEmptyArray()
    {
        $this->assertSame(
            [],
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesSetsFiles()
    {
        $this->subject->setFiles('foo, bar');

        $this->assertSame(
            ['foo', 'bar'],
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesWithIntegerResultsInString()
    {
        $this->subject->setFiles(123);
        $this->assertSame(
            ['123'],
            $this->subject->getFiles()
        );
    }

    /**
     * @test
     */
    public function setFilesWithBooleanResultsInString()
    {
        $this->subject->setFiles(true);
        $this->assertSame(
            ['1'],
            $this->subject->getFiles()
        );
    }
}
