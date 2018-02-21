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
 * Class Category
 *
 * @package JWeiland\Circular\Domain\Model
 */
class Category extends AbstractEntity
{
    /**
     * Title
     *
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

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
}
