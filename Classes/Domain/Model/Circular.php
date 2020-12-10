<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Main domain model for circulars
 */
class Circular extends AbstractEntity
{
    /**
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $number = '';

    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var \JWeiland\Circular\Domain\Model\Category
     */
    protected $category;

    /**
     * @var \DateTime
     */
    protected $dateOfCircular;

    /**
     * @var \JWeiland\Circular\Domain\Model\Department
     */
    protected $department;

    /**
     * Circular was send?
     *
     * @var bool
     */
    protected $send = false;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $files;

    public function __construct()
    {
        $this->files = new ObjectStorage();
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return Circular
     */
    public function setNumber(string $number): Circular
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Circular
     */
    public function setTitle(string $title): Circular
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * @param Category $category
     * @return Circular
     */
    public function setCategory(Category $category): Circular
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfCircular(): \DateTime
    {
        return $this->dateOfCircular;
    }

    /**
     * @param \DateTime $dateOfCircular
     * @return Circular
     */
    public function setDateOfCircular(\DateTime $dateOfCircular): Circular
    {
        $this->dateOfCircular = $dateOfCircular;
        return $this;
    }

    /**
     * @return Department
     */
    public function getDepartment(): Department
    {
        return $this->department;
    }

    /**
     * @param Department $department
     * @return Circular
     */
    public function setDepartment(Department $department): Circular
    {
        $this->department = $department;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSend(): bool
    {
        return $this->send;
    }

    /**
     * @return bool
     */
    public function isSend(): bool
    {
        return $this->getSend();
    }

    /**
     * @param bool $send
     * @return Circular
     */
    public function setSend(bool $send): Circular
    {
        $this->send = $send;
        return $this;
    }

    /**
     * @return ObjectStorage
     */
    public function getFiles(): ObjectStorage
    {
        return $this->files;
    }

    /**
     * @param ObjectStorage $files
     * @return Circular
     */
    public function setFiles(ObjectStorage $files): Circular
    {
        $this->files = $files;
        return $this;
    }
}
