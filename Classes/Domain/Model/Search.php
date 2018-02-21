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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Class Search
 *
 * @package JWeiland\Circular\Domain\Model
 */
class Search extends AbstractEntity
{
    /**
     * dateBegin
     *
     * @var \DateTime
     */
    protected $dateBegin;

    /**
     * dateEnd
     *
     * @var \DateTime
     */
    protected $dateEnd;

    /**
     * department
     *
     * @var Department
     */
    protected $department;

    /**
     * category
     *
     * @var string
     */
    protected $category = '';

    /**
     * search
     *
     * @var string
     */
    protected $search = '';

    /**
     * Returns the dateBegin
     *
     * @return \DateTime $dateBegin
     */
    public function getDateBegin()
    {
        return $this->dateBegin;
    }

    /**
     * Sets the dateBegin
     *
     * @param \DateTime $dateBegin
     * @return void
     */
    public function setDateBegin(\DateTime $dateBegin)
    {
        $this->dateBegin = $dateBegin;
    }

    /**
     * Returns the dateEnd
     *
     * @return \DateTime $dateEnd
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }

    /**
     * Sets the dateEnd
     *
     * @param \DateTime $dateEnd
     * @return void
     */
    public function setDateEnd(\DateTime $dateEnd)
    {
        $this->dateEnd = $dateEnd;
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
}
