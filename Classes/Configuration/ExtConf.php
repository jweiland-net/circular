<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Configuration;

use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
        // get global configuration
        $extConf = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('circular');
        if (is_array($extConf) && count($extConf)) {
            // call setter method foreach configuration entry
            foreach ($extConf as $key => $value) {
                $methodName = 'set' . ucfirst($key);
                if (method_exists($this, $methodName)) {
                    $this->$methodName((string)$value);
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
     * @return ExtConf
     */
    public function setFromEmail(string $fromEmail)
    {
        $this->fromEmail = $fromEmail;
        return $this;
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
     * @return ExtConf
     */
    public function setFromName(string $fromName)
    {
        $this->fromName = $fromName;
        return $this;
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
     * @return ExtConf
     */
    public function setReplytoEmail(string $replytoEmail)
    {
        $this->replytoEmail = $replytoEmail;
        return $this;
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
     * @return ExtConf
     */
    public function setReplytoName(string $replytoName): ExtConf
    {
        $this->replytoName = $replytoName;
        return $this;
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
     * @return ExtConf
     */
    public function setOrganisation(string $organisation)
    {
        $this->organisation = $organisation;
        return $this;
    }
}
