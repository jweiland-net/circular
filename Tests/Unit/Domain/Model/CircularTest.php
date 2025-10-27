<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Domain\Model;

use PHPUnit\Framework\Attributes\Test;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case.
 */
class CircularTest extends UnitTestCase
{
    protected Circular $subject;

    public function setUp(): void
    {
        $this->subject = new Circular();
    }

    public function tearDown(): void
    {
        unset($this->subject);
    }

    #[Test]
    public function getNumberInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNumber(),
        );
    }

    #[Test]
    public function setNumberSetsNumber(): void
    {
        $this->subject->setNumber('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getNumber(),
        );
    }

    #[Test]
    public function getTitleInitiallyReturnsEmptyString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle(),
        );
    }

    #[Test]
    public function setTitleSetsTitle(): void
    {
        $this->subject->setTitle('foo bar');

        self::assertSame(
            'foo bar',
            $this->subject->getTitle(),
        );
    }

    #[Test]
    public function setCategorySetsCategory(): void
    {
        $instance = new Category();
        $this->subject->setCategory($instance);

        self::assertSame(
            $instance,
            $this->subject->getCategory(),
        );
    }

    #[Test]
    public function setDateOfCircularSetsDateOfCircular(): void
    {
        $date = new \DateTime();
        $this->subject->setDateOfCircular($date);

        self::assertSame(
            $date,
            $this->subject->getDateOfCircular(),
        );
    }

    #[Test]
    public function setDepartmentSetsDepartment(): void
    {
        $instance = new Department();
        $this->subject->setDepartment($instance);

        self::assertSame(
            $instance,
            $this->subject->getDepartment(),
        );
    }

    #[Test]
    public function getSendInitiallyReturnsFalse(): void
    {
        self::assertFalse(
            $this->subject->getSend(),
        );
    }

    #[Test]
    public function setSendSetsSend(): void
    {
        $this->subject->setSend(true);
        self::assertTrue(
            $this->subject->getSend(),
        );
    }

    #[Test]
    public function getFilesInitiallyReturnsEmptyObjectStorage(): void
    {
        self::assertSame(
            [],
            $this->subject->getFiles()->toArray(),
        );
    }

    #[Test]
    public function setFilesSetsFiles(): void
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
            $this->subject->getFiles(),
        );
    }
}
