<?php
declare(strict_types = 1);
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

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Main domain model for circulars
 */
class Circular extends AbstractEntity
{
    /**
     * @var string
     * @validate NotEmpty
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
     * @lazy
     */
    protected $department;

    /**
     * Circular was send?
     *
     * @var bool
     */
    protected $send = false;

    /**
     * @var string
     */
    protected $fileName = '';

    /**
     * @var string
     */
    protected $files = '';

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber(string $number)
    {
        $this->number = $number;
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
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfCircular()
    {
        return $this->dateOfCircular;
    }

    /**
     * @param \DateTime $dateOfCircular
     */
    public function setDateOfCircular(\DateTime $dateOfCircular)
    {
        $this->dateOfCircular = $dateOfCircular;
    }

    /**
     * @return Department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param Department $department
     */
    public function setDepartment(Department $department)
    {
        $this->department = $department;
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
     */
    public function setSend(bool $send)
    {
        $this->send = $send;
    }

    /**
     * @return string
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return array
     */
    public function getFiles(): array
    {
        return GeneralUtility::trimExplode(',', $this->files, true);
    }

    /**
     * @param string $files
     */
    public function setFiles(string $files)
    {
        $this->files = $files;
    }
}
