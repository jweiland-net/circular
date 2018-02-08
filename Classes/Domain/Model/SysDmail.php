<?php
declare(strict_types=1);
namespace JWeiland\Circular\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
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
 * Class SysDmail
 *
 * @package JWeiland\Circular\Domain\Model
 */
class SysDmail extends AbstractEntity
{
    /**
     * Type
     *
     * @var int
     */
    protected $type = 0;

    /**
     * page
     *
     * @var int
     */
    protected $page = 0;
    /**
     * subject
     *
     * @var string
     */
    protected $subject = '';

    /**
     * from_email
     *
     * @var string
     */
    protected $fromEmail = '';

    /**
     * from_name
     *
     * @var string
     */
    protected $fromName = '';

    /**
     * replyto_email
     *
     * @var string
     */
    protected $replytoEmail = '';

    /**
     * replyto_name
     *
     * @var string
     */
    protected $replytoName = '';

    /**
     * organisation
     *
     * @var string
     */
    protected $organisation = '';

    /**
     * priority
     *
     * @var int
     */
    protected $priority = 3;

    /**
     * encoding
     *
     * @var string
     */
    protected $encoding = 'quoted-printable';

    /**
     * charset
     *
     * @var string
     */
    protected $charset = 'utf-8';

    /**
     * sendOptions
     * 3 is default value as defined in TCA of direct_mail
     *
     * @var int
     */
    protected $sendOptions = 3;

    /**
     * includeMedia
     *
     * @var int
     */
    protected $includeMedia = 0;

    /**
     * flowedFormat
     *
     * @var int
     */
    protected $flowedFormat = 0;

    /**
     * HTMLParams
     *
     * @var string
     */
    protected $htmlparams = '';

    /**
     * plainParams
     *
     * @var string
     */
    protected $plainparams = '&type=99';

    /**
     * issent
     *
     * @var boolean
     */
    protected $issent = false;

    /**
     * renderedsize
     *
     * @var int
     */
    protected $renderedsize = 0;

    /**
     * mailContent
     *
     * @var string
     */
    protected $mailcontent = '';

    /**
     * scheduled
     *
     * @var int
     */
    protected $scheduled = 0;

    /**
     * query_info
     *
     * @var string
     */
    protected $queryInfo = '';

    /**
     * scheduled_begin
     *
     * @var int
     */
    protected $scheduledBegin = 0;

    /**
     * scheduled_end
     *
     * @var int
     */
    protected $scheduledEnd = 0;

    /**
     * return_path
     *
     * @var string
     */
    protected $returnPath = '';

    /**
     * use_domain
     *
     * @var bool
     */
    protected $useDomain = true;

    /**
     * use_rdct
     *
     * @var bool
     */
    protected $useRdct = true;

    /**
     * long_link_rdct_url
     *
     * @var string
     */
    protected $longLinkRdctUrl = '';

    /**
     * long_link_mode
     *
     * @var bool
     */
    protected $longLinkMode = true;

    /**
     * authcode_fieldList
     *
     * @var string
     */
    protected $authcodeFieldlist = '';

    /**
     * Gets type
     *
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * Sets type
     *
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->type = $type;
    }

    /**
     * Gets page
     *
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * Sets page
     *
     * @param int $page
     */
    public function setPage(int $page)
    {
        $this->page = $page;
    }

    /**
     * Gets subject
     *
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * Sets subject
     *
     * @param string $subject
     */
    public function setSubject(string $subject)
    {
        $this->subject = $subject;
    }

    /**
     * Gets from email
     *
     * @return string
     */
    public function getFromEmail(): string
    {
        return $this->fromEmail;
    }

    /**
     * Sets from email
     *
     * @param string $fromEmail
     */
    public function setFromEmail(string $fromEmail)
    {
        $this->fromEmail = $fromEmail;
    }

    /**
     * Gets from name
     *
     * @return string
     */
    public function getFromName(): string
    {
        return $this->fromName;
    }

    /**
     * Sets from name
     *
     * @param string $fromName
     */
    public function setFromName(string $fromName)
    {
        $this->fromName = $fromName;
    }

    /**
     * Gets reply to email
     *
     * @return string
     */
    public function getReplytoEmail(): string
    {
        return $this->replytoEmail;
    }

    /**
     * Sets reply to email
     *
     * @param string $replytoEmail
     */
    public function setReplytoEmail(string $replytoEmail)
    {
        $this->replytoEmail = $replytoEmail;
        $this->returnPath = $replytoEmail;
    }

    /**
     * Gets reply to name
     *
     * @return string
     */
    public function getReplytoName(): string
    {
        return $this->replytoName;
    }

    /**
     * Sets reply to name
     *
     * @param string $replytoName
     */
    public function setReplytoName(string $replytoName)
    {
        $this->replytoName = $replytoName;
    }

    /**
     * Gets organisation
     *
     * @return string
     */
    public function getOrganisation(): string
    {
        return $this->organisation;
    }

    /**
     * Sets organisation
     *
     * @param string $organisation
     */
    public function setOrganisation(string $organisation)
    {
        $this->organisation = $organisation;
    }

    /**
     * Gets priority
     *
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * Sets priority
     *
     * @param int $priority
     */
    public function setPriority(int $priority)
    {
        $this->priority = $priority;
    }

    /**
     * Gets encoding
     *
     * @return string
     */
    public function getEncoding(): string
    {
        return $this->encoding;
    }

    /**
     * Sets encoding
     *
     * @param string $encoding
     */
    public function setEncoding(string $encoding)
    {
        $this->encoding = $encoding;
    }

    /**
     * Gets charset
     *
     * @return string
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * Sets charset
     *
     * @param string $charset
     */
    public function setCharset(string $charset)
    {
        $this->charset = $charset;
    }

    /**
     * Gets send options
     *
     * @return int
     */
    public function getSendOptions(): int
    {
        return $this->sendOptions;
    }

    /**
     * Sets send options
     *
     * @param int $sendOptions
     */
    public function setSendOptions(int $sendOptions)
    {
        $this->sendOptions = $sendOptions;
    }

    /**
     * Gets include media
     *
     * @return int
     */
    public function getIncludeMedia(): int
    {
        return $this->includeMedia;
    }

    /**
     * Sets include media
     *
     * @param int $includeMedia
     */
    public function setIncludeMedia(int $includeMedia)
    {
        $this->includeMedia = $includeMedia;
    }

    /**
     * Gets flowed format
     *
     * @return int
     */
    public function getFlowedFormat(): int
    {
        return $this->flowedFormat;
    }

    /**
     * Sets flowed format
     *
     * @param int $flowedFormat
     */
    public function setFlowedFormat(int $flowedFormat)
    {
        $this->flowedFormat = $flowedFormat;
    }

    /**
     * Gets html params
     *
     * @return string
     */
    public function getHtmlparams(): string
    {
        return $this->htmlparams;
    }

    /**
     * Sets html params
     *
     * @param string $htmlparams
     */
    public function setHtmlparams(string $htmlparams)
    {
        $this->htmlparams = $htmlparams;
    }

    /**
     * Get plain params
     *
     * @return string
     */
    public function getPlainparams(): string
    {
        return $this->plainparams;
    }

    /**
     * Sets plain params
     *
     * @param string $plainparams
     */
    public function setPlainparams(string $plainparams)
    {
        $this->plainparams = $plainparams;
    }

    /**
     * Gets is sent
     *
     * @return bool
     */
    public function getIssent(): bool
    {
        return $this->issent;
    }

    /**
     * Sets is sent
     *
     * @param bool $issent
     */
    public function setIssent(bool $issent)
    {
        $this->issent = $issent;
    }

    /**
     * Gets rendered size
     *
     * @return int
     */
    public function getRenderedsize(): int
    {
        return $this->renderedsize;
    }

    /**
     * Sets rendered size
     *
     * @param int $renderedsize
     */
    public function setRenderedsize(int $renderedsize)
    {
        $this->renderedsize = $renderedsize;
    }

    /**
     * Gets mail content
     *
     * @return string
     */
    public function getMailcontent(): string
    {
        return $this->mailcontent;
    }

    /**
     * Sets mail content
     *
     * @param string $mailcontent
     */
    public function setMailcontent(string $mailcontent)
    {
        $this->mailcontent = $mailcontent;
        $this->renderedsize = strlen($mailcontent);
    }

    /**
     * Gets scheduled
     *
     * @return int
     */
    public function getScheduled(): int
    {
        return $this->scheduled;
    }

    /**
     * Sets scheduled
     *
     * @param int $scheduled
     */
    public function setScheduled(int $scheduled)
    {
        $this->scheduled = $scheduled;
    }

    /**
     * Gets query info
     *
     * @return string
     */
    public function getQueryInfo(): string
    {
        return $this->queryInfo;
    }

    /**
     * Sets query info
     *
     * @param string $queryInfo
     */
    public function setQueryInfo(string $queryInfo)
    {
        $this->queryInfo = $queryInfo;
    }

    /**
     * Gets scheduled begin
     *
     * @return int
     */
    public function getScheduledBegin(): int
    {
        return $this->scheduledBegin;
    }

    /**
     * Sets scheduled begin
     *
     * @param int $scheduledBegin
     */
    public function setScheduledBegin(int $scheduledBegin)
    {
        $this->scheduledBegin = $scheduledBegin;
    }

    /**
     * Gets scheduled end
     *
     * @return int
     */
    public function getScheduledEnd(): int
    {
        return $this->scheduledEnd;
    }

    /**
     * Sets scheduled end
     *
     * @param int $scheduledEnd
     */
    public function setScheduledEnd(int $scheduledEnd)
    {
        $this->scheduledEnd = $scheduledEnd;
    }

    /**
     * Gets return path
     *
     * @return string
     */
    public function getReturnPath(): string
    {
        return $this->returnPath;
    }

    /**
     * Sets return path
     *
     * @param string $returnPath
     */
    public function setReturnPath(string $returnPath)
    {
        $this->returnPath = $returnPath;
    }

    /**
     * Gets use domain
     *
     * @return bool
     */
    public function getUseDomain(): bool
    {
        return $this->useDomain;
    }

    /**
     * Sets use domain
     *
     * @param bool $useDomain
     */
    public function setUseDomain(bool $useDomain)
    {
        $this->useDomain = $useDomain;
    }

    /**
     * Gets use rdct
     *
     * @return bool
     */
    public function getUseRdct(): bool
    {
        return $this->useRdct;
    }

    /**
     * Sets use rdct
     *
     * @param bool $useRdct
     */
    public function setUseRdct(bool $useRdct)
    {
        $this->useRdct = $useRdct;
    }

    /**
     * Gets long link rdct url
     *
     * @return string
     */
    public function getLongLinkRdctUrl(): string
    {
        return $this->longLinkRdctUrl;
    }

    /**
     * Sets long link rdtc url
     *
     * @param string $longLinkRdctUrl
     */
    public function setLongLinkRdctUrl(string $longLinkRdctUrl)
    {
        $this->longLinkRdctUrl = $longLinkRdctUrl;
    }

    /**
     * Gets long link mode
     *
     * @return bool
     */
    public function getLongLinkMode(): bool
    {
        return $this->longLinkMode;
    }

    /**
     * Sets long link mode
     *
     * @param bool $longLinkMode
     */
    public function setLongLinkMode(bool $longLinkMode)
    {
        $this->longLinkMode = $longLinkMode;
    }

    /**
     * Gets auth code field list
     *
     * @return string
     */
    public function getAuthcodeFieldlist(): string
    {
        return $this->authcodeFieldlist;
    }

    /**
     * Sets auth code field list
     *
     * @param string $authcodeFieldlist
     */
    public function setAuthcodeFieldlist(string $authcodeFieldlist)
    {
        $this->authcodeFieldlist = $authcodeFieldlist;
    }
}
