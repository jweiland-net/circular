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
 * Class Telephone
 *
 * @package JWeiland\Circular\Domain\Model
 */
class Telephone extends AbstractEntity
{
    /**
     * first_name
     *
     * @var string
     */
    protected $firstName = '';

    /**
     * last_name
     *
     * @var string
     */
    protected $lastName = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * Returns the firstName
     *
     * @return string $firstName
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * Sets the firstName
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Returns the lastName
     *
     * @return string $lastName
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * Sets the lastName
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
}
