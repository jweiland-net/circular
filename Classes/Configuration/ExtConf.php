<?php
namespace JWeiland\Circular\Configuration;

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

use TYPO3\CMS\Core\SingletonInterface;

/**
 * Class ExtConf
 *
 * @package JWeiland\Circular\Configuration
 */
class ExtConf implements SingletonInterface
{
    /**
     * from_email
     *
     * @var string
     */
    protected $fromEmail;
    /**
     * from_name
     *
     * @var string
     */
    protected $fromName;
    /**
     * replytoEmail
     *
     * @var string
     */
    protected $replytoEmail;
    /**
     * replytoName
     *
     * @var string
     */
    protected $replytoName;
    /**
     * organisation
     *
     * @var string
     */
    protected $organisation;

    /**
     * constructor of this class
     * This method reads the global configuration and calls the setter methods
     */
    public function __construct()
    {
        // get global configuration
        $extConf = \unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['circular']);
        if (\is_array($extConf) && \count($extConf)) {
            // call setter method foreach configuration entry
            foreach ($extConf as $key => $value) {
                $methodName = 'set' . \ucfirst($key);
                if (\method_exists($this, $methodName)) {
                    $this->$methodName($value);
                }
            }
        }
    }

    /**
     * getter for from_email
     *
     * @return string
     */
    public function getFromEmail()
    {
        if (empty($this->fromEmail)) {
            return $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'];
        }

        return $this->fromEmail;
    }

    /**
     * setter for from_email
     *
     * @param string $fromEmail
     * @return void
     */
    public function setFromEmail($fromEmail)
    {
        $this->fromEmail = (string)$fromEmail;
    }

    /**
     * getter for fromName
     *
     * @return string
     */
    public function getFromName()
    {
        if (empty($this->fromName)) {
            return $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'];
        }

        return $this->fromName;
    }

    /**
     * setter for from_name
     *
     * @param string $fromName
     * @return void
     */
    public function setFromName($fromName)
    {
        $this->fromName = (string)$fromName;
    }

    /**
     * getter for replyto_email
     *
     * @return string
     */
    public function getReplytoEmail()
    {
        return $this->replytoEmail;
    }

    /**
     * setter for replytoEmail
     *
     * @param string $replytoEmail
     * @return void
     */
    public function setReplytoEmail($replytoEmail)
    {
        $this->replytoEmail = (string)$replytoEmail;
    }

    /**
     * getter for replytoName
     *
     * @return string
     */
    public function getReplytoName()
    {
        return $this->replytoName;
    }

    /**
     * setter for replyto_name
     *
     * @param string $replytoName
     * @return void
     */
    public function setReplytoName($replytoName)
    {
        $this->replytoName = (string)$replytoName;
    }

    /**
     * getter for organisation
     *
     * @return string
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * setter for organisation
     *
     * @param string $organisation
     * @return void
     */
    public function setOrganisation($organisation)
    {
        $this->organisation = (string)$organisation;
    }
}
