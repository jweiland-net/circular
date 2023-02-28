<?php

declare(strict_types=1);

/*
 * This file is part of the package jweiland/circular.
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

namespace JWeiland\Circular\Configuration;

use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException;
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

    public function __construct(ExtensionConfiguration $extensionConfiguration)
    {
        try {
            $extConf = $extensionConfiguration->get('circular');
            if (is_array($extConf) && count($extConf)) {
                // call setter method foreach configuration entry
                foreach ($extConf as $key => $value) {
                    $methodName = 'set' . ucfirst($key);
                    if (method_exists($this, $methodName)) {
                        $this->$methodName((string)$value);
                    }
                }
            }
        } catch (ExtensionConfigurationExtensionNotConfiguredException | ExtensionConfigurationPathDoesNotExistException $e) {
        }
    }

    public function getFromEmail(): string
    {
        if ($this->fromEmail === '') {
            return $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromAddress'];
        }

        return $this->fromEmail;
    }

    public function setFromEmail(string $fromEmail): void
    {
        $this->fromEmail = $fromEmail;
    }

    public function getFromName(): string
    {
        if ($this->fromName === '') {
            return $GLOBALS['TYPO3_CONF_VARS']['MAIL']['defaultMailFromName'];
        }

        return $this->fromName;
    }

    public function setFromName(string $fromName): void
    {
        $this->fromName = $fromName;
    }

    public function getReplytoEmail(): string
    {
        return $this->replytoEmail;
    }

    public function setReplytoEmail(string $replytoEmail): void
    {
        $this->replytoEmail = $replytoEmail;
    }

    public function getReplytoName(): string
    {
        return $this->replytoName;
    }

    public function setReplytoName(string $replytoName): void
    {
        $this->replytoName = $replytoName;
    }

    public function getOrganisation(): string
    {
        return $this->organisation;
    }

    public function setOrganisation(string $organisation): void
    {
        $this->organisation = $organisation;
    }
}
