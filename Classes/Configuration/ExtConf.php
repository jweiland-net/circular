<?php
declare(strict_types = 1);
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
 * This class will streamline the values from extension manager configuration
 */
class ExtConf implements SingletonInterface
{
    /**
     * @var string
     */
    protected $fromEmail = '';

    /**
     * @var string
     */
    protected $fromName = '';

    /**
     * @var string
     */
    protected $replytoEmail = '';

    /**
     * @var string
     */
    protected $replytoName = '';

    /**
     * @var string
     */
    protected $organisation;

    public function __construct()
    {
        if (isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['circular'])) {
            // get global configuration
            $extConf = \unserialize(
                $GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['circular'],
                ['allowed_classes' => false]
            );
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
    }

    /**
     * @return string
     */
    public function getFromEmail(): string
    {
        if (empty($this->fromEmail)) {
            return $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'];
        }

        return $this->fromEmail;
    }

    /**
     * @param string $fromEmail
     */
    public function setFromEmail(string $fromEmail)
    {
        $this->fromEmail = $fromEmail;
    }

    /**
     * @return string
     */
    public function getFromName(): string
    {
        if (empty($this->fromName)) {
            return $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'];
        }

        return $this->fromName;
    }

    /**
     * @param string $fromName
     */
    public function setFromName(string $fromName)
    {
        $this->fromName = $fromName;
    }

    /**
     * @return string
     */
    public function getReplytoEmail(): string
    {
        return $this->replytoEmail;
    }

    /**
     * @param string $replytoEmail
     */
    public function setReplytoEmail(string $replytoEmail)
    {
        $this->replytoEmail = $replytoEmail;
    }

    /**
     * @return string
     */
    public function getReplytoName(): string
    {
        return $this->replytoName;
    }

    /**
     * @param string $replytoName
     */
    public function setReplytoName(string $replytoName)
    {
        $this->replytoName = $replytoName;
    }

    /**
     * @return string
     */
    public function getOrganisation(): string
    {
        return $this->organisation;
    }

    /**
     * @param string $organisation
     */
    public function setOrganisation(string $organisation)
    {
        $this->organisation = $organisation;
    }
}
