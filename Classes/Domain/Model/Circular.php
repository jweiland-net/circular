<?php
declare(strict_types=1);
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
 * Class Circular
 *
 * @package JWeiland\Circular\Domain\Model
 */
class Circular extends AbstractEntity
{
    /**
     * Number
     *
     * @var string
     * @validate NotEmpty
     */
    protected $number = '';

    /**
     * Title
     *
     * @var string
     */
    protected $title = '';

    /**
     * Category
     *
     * @var \JWeiland\Circular\Domain\Model\Category
     */
    protected $category;

    /**
     * Date of Circular
     *
     * @var \DateTime
     */
    protected $dateOfCircular;

    /**
     * Department
     *
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
     * FileName
     *
     * @var string
     */
    protected $fileName = '';

    /**
     * Files
     *
     * @var string
     */
    protected $files = '';

    /**
     * Returns the number
     *
     * @return string $number
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Sets the number
     *
     * @param string $number
     * @return void
     */
    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the category
     *
     * @return Category $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category
     *
     * @param Category $category
     * @return void
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Returns the dateOfCircular
     *
     * @return \DateTime $dateOfCircular
     */
    public function getDateOfCircular()
    {
        return $this->dateOfCircular;
    }

    /**
     * Sets the dateOfCircular
     *
     * @param \DateTime $dateOfCircular
     * @return void
     */
    public function setDateOfCircular(\DateTime $dateOfCircular)
    {
        $this->dateOfCircular = $dateOfCircular;
    }

    /**
     * Returns the department
     *
     * @return Department $department
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Sets the department
     *
     * @param Department $department
     * @return void
     */
    public function setDepartment(Department $department)
    {
        $this->department = $department;
    }

    /**
     * Returns the send
     *
     * @return bool $send
     */
    public function getSend(): bool
    {
        return $this->send;
    }

    /**
     * Returns the bool state of send
     *
     * @return bool
     */
    public function isSend(): bool
    {
        return $this->getSend();
    }

    /**
     * Sets the send
     *
     * @param bool $send
     * @return void
     */
    public function setSend(bool $send)
    {
        $this->send = $send;
    }

    /**
     * Returns the fileName
     *
     * @return string $fileName
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * Sets the fileName
     *
     * @param string $fileName
     * @return void
     */
    public function setFileName(string $fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * Returns the files
     *
     * @return array $files
     */
    public function getFiles(): array
    {
        return GeneralUtility::trimExplode(',', $this->files, true);
    }

    /**
     * Sets the files
     *
     * @param string $files
     * @return void
     */
    public function setFiles(string $files)
    {
        $this->files = $files;
    }
}
