<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Main domain model for circulars
 */
class Circular extends AbstractEntity
{
    /**
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected $number = '';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var Category
     */
    protected $category;

    /**
     * @var \DateTime
     */
    protected $dateOfCircular;

    /**
     * @var Department
     */
    protected $department;

    /**
     * Circular was send?
     *
     * @var bool
     */
    protected $send = false;

    /**
     * @var ObjectStorage<FileReference>
     */
    protected $files;

    public function __construct()
    {
        $this->files = new ObjectStorage();
    }

    /**
     * Called again with initialize object, as fetching an entity from the DB does not use the constructor
     */
    public function initializeObject(): void
    {
        $this->files = $this->files ?? new ObjectStorage();
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    public function getDateOfCircular(): \DateTime
    {
        return $this->dateOfCircular;
    }

    public function setDateOfCircular(\DateTime $dateOfCircular): void
    {
        $this->dateOfCircular = $dateOfCircular;
    }

    public function getDepartment(): Department
    {
        return $this->department;
    }

    public function setDepartment(Department $department): void
    {
        $this->department = $department;
    }

    public function getSend(): bool
    {
        return $this->send;
    }

    public function isSend(): bool
    {
        return $this->getSend();
    }

    public function setSend(bool $send): void
    {
        $this->send = $send;
    }

    public function getFiles(): ObjectStorage
    {
        return $this->files;
    }

    public function setFiles(ObjectStorage $files): void
    {
        $this->files = $files;
    }
}
