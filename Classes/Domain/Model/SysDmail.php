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

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

/**
 * Special domain model class for direct mail records.
 */
class SysDmail extends AbstractEntity
{
    /**
     * @var int
     */
    protected $type = 0;

    /**
     * @var int
     */
    protected $page = 0;

    /**
     * @var string
     */
    protected $subject = '';

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
    protected $organisation = '';

    /**
     * @var int
     */
    protected $priority = 3;

    /**
     * @var string
     */
    protected $encoding = 'quoted-printable';

    /**
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
     * @var int
     */
    protected $includeMedia = 0;

    /**
     * @var int
     */
    protected $flowedFormat = 0;

    /**
     * @var string
     */
    protected $htmlparams = '';

    /**
     * @var string
     */
    protected $plainparams = '&type=99';

    /**
     * @var bool
     */
    protected $issent = false;

    /**
     * @var int
     */
    protected $renderedsize = 0;

    /**
     * @var string
     */
    protected $mailcontent = '';

    /**
     * @var int
     */
    protected $scheduled = 0;

    /**
     * @var string
     */
    protected $queryInfo = '';

    /**
     * @var int
     */
    protected $scheduledBegin = 0;

    /**
     * @var int
     */
    protected $scheduledEnd = 0;

    /**
     * @var string
     */
    protected $returnPath = '';

    /**
     * @var bool
     */
    protected $useDomain = true;

    /**
     * @var bool
     */
    protected $useRdct = true;

    /**
     * @var string
     */
    protected $longLinkRdctUrl = '';

    /**
     * @var bool
     */
    protected $longLinkMode = true;

    /**
     * @var string
     */
    protected $authcodeFieldlist = '';

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page)
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject(string $subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return string
     */
    public function getFromEmail(): string
    {
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
        $this->returnPath = $replytoEmail;
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

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority(int $priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return string
     */
    public function getEncoding(): string
    {
        return $this->encoding;
    }

    /**
     * @param string $encoding
     */
    public function setEncoding(string $encoding)
    {
        $this->encoding = $encoding;
    }

    /**
     * @return string
     */
    public function getCharset(): string
    {
        return $this->charset;
    }

    /**
     * @param string $charset
     */
    public function setCharset(string $charset)
    {
        $this->charset = $charset;
    }

    /**
     * @return int
     */
    public function getSendOptions(): int
    {
        return $this->sendOptions;
    }

    /**
     * @param int $sendOptions
     */
    public function setSendOptions(int $sendOptions)
    {
        $this->sendOptions = $sendOptions;
    }

    /**
     * @return int
     */
    public function getIncludeMedia(): int
    {
        return $this->includeMedia;
    }

    /**
     * @param int $includeMedia
     */
    public function setIncludeMedia(int $includeMedia)
    {
        $this->includeMedia = $includeMedia;
    }

    /**
     * @return int
     */
    public function getFlowedFormat(): int
    {
        return $this->flowedFormat;
    }

    /**
     * @param int $flowedFormat
     */
    public function setFlowedFormat(int $flowedFormat)
    {
        $this->flowedFormat = $flowedFormat;
    }

    /**
     * @return string
     */
    public function getHtmlparams(): string
    {
        return $this->htmlparams;
    }

    /**
     * @param string $htmlparams
     */
    public function setHtmlparams(string $htmlparams)
    {
        $this->htmlparams = $htmlparams;
    }

    /**
     * @return string
     */
    public function getPlainparams(): string
    {
        return $this->plainparams;
    }

    /**
     * @param string $plainparams
     */
    public function setPlainparams(string $plainparams)
    {
        $this->plainparams = $plainparams;
    }

    /**
     * @return bool
     */
    public function getIssent(): bool
    {
        return $this->issent;
    }

    /**
     * @param bool $issent
     */
    public function setIssent(bool $issent)
    {
        $this->issent = $issent;
    }

    /**
     * @return int
     */
    public function getRenderedsize(): int
    {
        return $this->renderedsize;
    }

    /**
     * @param int $renderedsize
     */
    public function setRenderedsize(int $renderedsize)
    {
        $this->renderedsize = $renderedsize;
    }

    /**
     * @return string
     */
    public function getMailcontent(): string
    {
        return $this->mailcontent;
    }

    /**
     * @param string $mailcontent
     */
    public function setMailcontent(string $mailcontent)
    {
        $this->mailcontent = $mailcontent;
        $this->renderedsize = strlen($mailcontent);
    }

    /**
     * @return int
     */
    public function getScheduled(): int
    {
        return $this->scheduled;
    }

    /**
     * @param int $scheduled
     */
    public function setScheduled(int $scheduled)
    {
        $this->scheduled = $scheduled;
    }

    /**
     * @return string
     */
    public function getQueryInfo(): string
    {
        return $this->queryInfo;
    }

    /**
     * @param string $queryInfo
     */
    public function setQueryInfo(string $queryInfo)
    {
        $this->queryInfo = $queryInfo;
    }

    /**
     * @return int
     */
    public function getScheduledBegin(): int
    {
        return $this->scheduledBegin;
    }

    /**
     * @param int $scheduledBegin
     */
    public function setScheduledBegin(int $scheduledBegin)
    {
        $this->scheduledBegin = $scheduledBegin;
    }

    /**
     * @return int
     */
    public function getScheduledEnd(): int
    {
        return $this->scheduledEnd;
    }

    /**
     * @param int $scheduledEnd
     */
    public function setScheduledEnd(int $scheduledEnd)
    {
        $this->scheduledEnd = $scheduledEnd;
    }

    /**
     * @return string
     */
    public function getReturnPath(): string
    {
        return $this->returnPath;
    }

    /**
     * @param string $returnPath
     */
    public function setReturnPath(string $returnPath)
    {
        $this->returnPath = $returnPath;
    }

    /**
     * @return bool
     */
    public function getUseDomain(): bool
    {
        return $this->useDomain;
    }

    /**
     * @param bool $useDomain
     */
    public function setUseDomain(bool $useDomain)
    {
        $this->useDomain = $useDomain;
    }

    /**
     * @return bool
     */
    public function getUseRdct(): bool
    {
        return $this->useRdct;
    }

    /**
     * @param bool $useRdct
     */
    public function setUseRdct(bool $useRdct)
    {
        $this->useRdct = $useRdct;
    }

    /**
     * @return string
     */
    public function getLongLinkRdctUrl(): string
    {
        return $this->longLinkRdctUrl;
    }

    /**
     * @param string $longLinkRdctUrl
     */
    public function setLongLinkRdctUrl(string $longLinkRdctUrl)
    {
        $this->longLinkRdctUrl = $longLinkRdctUrl;
    }

    /**
     * @return bool
     */
    public function getLongLinkMode(): bool
    {
        return $this->longLinkMode;
    }

    /**
     * @param bool $longLinkMode
     */
    public function setLongLinkMode(bool $longLinkMode)
    {
        $this->longLinkMode = $longLinkMode;
    }

    /**
     * @return string
     */
    public function getAuthcodeFieldlist(): string
    {
        return $this->authcodeFieldlist;
    }

    /**
     * @param string $authcodeFieldlist
     */
    public function setAuthcodeFieldlist(string $authcodeFieldlist)
    {
        $this->authcodeFieldlist = $authcodeFieldlist;
    }
}
