<?php

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Domain\Model;

use Nimut\TestingFramework\TestCase\UnitTestCase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

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
        self::assertSame(
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

        self::assertSame(
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
        self::assertSame('123', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function setNumberWithBooleanResultsInString()
    {
        $this->subject->setNumber(true);
        self::assertSame('1', $this->subject->getNumber());
    }

    /**
     * @test
     */
    public function getTitleInitiallyReturnsEmptyString()
    {
        self::assertSame(
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

        self::assertSame(
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
        self::assertSame('123', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setTitleWithBooleanResultsInString()
    {
        $this->subject->setTitle(true);
        self::assertSame('1', $this->subject->getTitle());
    }

    /**
     * @test
     */
    public function setCategorySetsCategory()
    {
        $instance = new Category();
        $this->subject->setCategory($instance);

        self::assertSame(
            $instance,
            $this->subject->getCategory()
        );
    }

    /**
     * @test
     */
    public function setDateOfCircularSetsDateOfCircular()
    {
        $date = new \DateTime();
        $this->subject->setDateOfCircular($date);

        self::assertSame(
            $date,
            $this->subject->getDateOfCircular()
        );
    }

    /**
     * @test
     */
    public function setDepartmentSetsDepartment()
    {
        $instance = new Department();
        $this->subject->setDepartment($instance);

        self::assertSame(
            $instance,
            $this->subject->getDepartment()
        );
    }

    /**
     * @test
     */
    public function getSendInitiallyReturnsFalse()
    {
        self::assertFalse(
            $this->subject->getSend()
        );
    }

    /**
     * @test
     */
    public function setSendSetsSend()
    {
        $this->subject->setSend(true);
        self::assertTrue(
            $this->subject->getSend()
        );
    }

    /**
     * @test
     */
    public function setSendWithStringReturnsTrue()
    {
        $this->subject->setSend('foo bar');
        self::assertTrue($this->subject->getSend());
    }

    /**
     * @test
     */
    public function setSendWithZeroReturnsFalse()
    {
        $this->subject->setSend(0);
        self::assertFalse($this->subject->getSend());
    }

    /**
     * @test
     */
    public function getFilesInitiallyReturnsEmptyObjectStorage()
    {
        self::assertSame(
            [],
            $this->subject->getFiles()->toArray()
        );
    }

    /**
     * @test
     */
    public function setFilesSetsFiles()
    {
        $file1 = new FileReference();
        $file1->setPid(1);
        $file2 = new FileReference();
        $file2->setPid(2);

        $objectStorage = new ObjectStorage();
        $objectStorage->attach($file1);
        $objectStorage->attach($file2);
        $this->subject->setFiles($objectStorage);

        self::assertSame(
            $objectStorage,
            $this->subject->getFiles()
        );
    }
}
